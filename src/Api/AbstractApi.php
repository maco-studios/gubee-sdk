<?php

declare(strict_types=1);

namespace Gubee\SDK\Api;

use finfo;
use Gubee\SDK\Gubee;
use Gubee\SDK\Library\HttpClient\ResponseHandler;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

use function array_filter;
use function array_merge;
use function basename;
use function class_exists;
use function count;
use function fopen;
use function func_get_args;
use function implode;
use function json_encode;
use function rawurlencode;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;
use function str_replace;
use function strpos;

use const FILEINFO_MIME_TYPE;

abstract class AbstractApi
{
    /**
     * @var string The base URI for the API
     */
    protected const URI_PREFIX = '/api/';

    protected Gubee $client;

    public function __construct(Gubee $client)
    {
        $this->client = $client;
    }

    /**
     * Send a GET request with query parameters.
     *
     * @param string $uri The URI to send the request to
     * @param array $params The query parameters
     * @param array $headers The headers to send with the request
     * @return mixed
     */
    protected function get(string $uri, array $params = [], array $headers = [])
    {
        $response = $this->client->getHttpClient()->get(
            self::prepareUri(self::URI_PREFIX . $uri, $params),
            $headers
        );

        return ResponseHandler::getContent($response);
    }

    /**
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @param array<string,string> $files
     * @param array<string,mixed>  $uriParams
     * @param string|null          $rawBody   Raw string payload for the request body
     * @return mixed
     */
    protected function post(
        string $uri,
        array $params = [],
        array $headers = [],
        array $files = [],
        array $uriParams = [],
        ?string $rawBody = null
    ) {
        if ($rawBody !== null) {
            $body = $rawBody;
        } elseif (0 < count($files)) {
            $builder = $this->createMultipartStreamBuilder($params, $files);
            $body    = self::prepareMultipartBody($builder);
            $headers = self::addMultipartContentType($headers, $builder);
        } else {
            $body = self::prepareJsonBody($params);
            if ($body !== null) {
                $headers = self::addJsonContentType($headers);
            }
        }

        $response = $this->client->getHttpClient()->post(self::prepareUri($uri, $uriParams), $headers, $body);

        return ResponseHandler::getContent($response);
    }

    /**
     * Add the JSON content type to the headers if one is not already present.
     *
     * @param array<string,string> $headers
     * @return array<string,string>
     */
    protected static function addJsonContentType(array $headers): array
    {
        return array_merge(
            [
                ResponseHandler::CONTENT_TYPE_HEADER => ResponseHandler::JSON_CONTENT_TYPE,
            ],
            $headers
        );
    }

    /**
     * Add the multipart content type to the headers if one is not already present.
     *
     * @param array<string,string>   $headers
     * @return array<string,string>
     */
    protected static function addMultipartContentType(array $headers, MultipartStreamBuilder $builder): array
    {
        $contentType = sprintf(
            '%s; boundary=%s',
            ResponseHandler::MULTIPART_CONTENT_TYPE,
            $builder->getBoundary()
        );

        return array_merge(
            [
                ResponseHandler::CONTENT_TYPE_HEADER => $contentType,
            ],
            $headers
        );
    }

    /**
     * Prepare the request JSON body.
     *
     * @param array<string,mixed> $params
     */
    protected static function prepareJsonBody(array $params): ?string
    {
        $params = array_filter($params, function ($value): bool {
            return null !== $value;
        });

        if (0 === count($params)) {
            return null;
        }

        return json_encode($params);
    }

    /**
     * Prepare the request multipart body.
     */
    protected static function prepareMultipartBody(MultipartStreamBuilder $builder): StreamInterface
    {
        return $builder->build();
    }

    /**
     * Prepare the URI for the request by replacing the path with the given
     * parameters and adding the query parameters.
     *
     * @param array $query
     */
    protected static function prepareUri(
        string $uri,
        array $query = []
    ): string {
        $queryParams = [];
        foreach ($query as $key => $value) {
            if (strpos($key, ':') === 0) {
                $uri = str_replace($key, rawurlencode($value), $uri);
            } else {
                $queryParams[] = rawurlencode($key) . '=' . rawurlencode($value);
            }
        }
        if (! empty($queryParams)) {
            $uri .= (strpos($uri, '?') === false ? '?' : '&')
                . implode('&', $queryParams);
        }
        return $uri;
    }

    /**
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @param array<string,string> $files
     * @return mixed
     */
    protected function patch(string $uri, array $params = [], array $headers = [], array $files = [])
    {
        if (0 < count($files)) {
            $builder = $this->createMultipartStreamBuilder($params, $files);
            $body    = self::prepareMultipartBody($builder);
            $headers = self::addMultipartContentType($headers, $builder);
        } else {
            $body = self::prepareJsonBody($params);

            if (null !== $body) {
                $headers = self::addJsonContentType($headers);
            }
        }

        $response = $this->client->getHttpClient()->patch(self::prepareUri($uri), $headers, $body ?? '');

        return ResponseHandler::getContent($response);
    }

    /**
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @return mixed
     */
    protected function delete(string $uri, array $params = [], array $headers = [])
    {
        $body = self::prepareJsonBody($params);

        if (null !== $body) {
            $headers = self::addJsonContentType($headers);
        }

        $response = $this->client->getHttpClient()->delete(self::prepareUri($uri), $headers, $body ?? '');

        return ResponseHandler::getContent($response);
    }

    /**
     * Prepare the request URI.
     *
     * @param array<string,mixed>  $params
     * @param array<string,string> $files
     */
    protected function createMultipartStreamBuilder(
        array $params = [],
        array $files = []
    ): MultipartStreamBuilder {
        $builder = new MultipartStreamBuilder(
            $this->client->getClientBuilder()
                ->getStreamFactory()
        );

        foreach ($params as $name => $value) {
            $builder->addResource($name, $value);
        }

        foreach ($files as $name => $file) {
            $builder->addResource(
                $name,
                self::tryFopen($file, 'r'),
                [
                    'headers'  => [
                        ResponseHandler::CONTENT_TYPE_HEADER => self::guessFileContentType($file),
                    ],
                    'filename' => basename($file),
                ]
            );
        }

        return $builder;
    }

    /**
     * Safely opens a PHP stream resource using a filename.
     *
     * When fopen fails, PHP normally raises a warning. This function adds an
     * error handler that checks for errors and throws an exception instead.
     *
     * @see https://github.com/guzzle/psr7/blob/1.6.1/src/functions.php#L287-L320
     *
     * @param string $filename File to open
     * @param string $mode     Mode used to open the file
     * @throws RuntimeException If the file cannot be opened.
     * @return resource
     */
    private static function tryFopen(string $filename, string $mode)
    {
        $ex = null;
        set_error_handler(function () use ($filename, $mode, &$ex): void {
            $ex = new RuntimeException(
                sprintf(
                    'Unable to open %s using mode %s: %s',
                    $filename,
                    $mode,
                    func_get_args()[1]
                )
            );
        });

        $handle = fopen($filename, $mode);
        restore_error_handler();

        if (null !== $ex) {
            throw $ex;
        }

        return $handle;
    }

    /**
     * Guess the content type of the file if possible.
     */
    protected static function guessFileContentType(string $file): string
    {
        if (! class_exists(finfo::class, false)) {
            return ResponseHandler::STREAM_CONTENT_TYPE;
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type  = $finfo->file($file);

        return false !== $type ? $type : ResponseHandler::STREAM_CONTENT_TYPE;
    }
}
