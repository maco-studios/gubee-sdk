<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

use finfo;
use Gubee\SDK\Client;
use Gubee\SDK\Library\HttpClient\QueryStringBuilder;
use Gubee\SDK\Library\HttpClient\ResponseMediator;
use Http\Client\Exception;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

use function array_filter;
use function array_merge;
use function basename;
use function class_exists;
use function count;
use function fopen;
use function func_get_args;
use function json_encode;
use function rawurlencode;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;

use const FILEINFO_MIME_TYPE;

abstract class AbstractResource
{
    /**
     * The URI prefix.
     *
     * @var string
     */
    private const URI_PREFIX = '/api';

    /**
     * The client instance.
     */
    protected Client $client;

    /**
     * Create a new API instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Send a GET request with query params and return the raw response.
     *
     * @param array                $params
     * @param array<string,string> $headers
     * @throws Exception
     */
    protected function getAsResponse(
        string $uri,
        array $params = [],
        array $headers = []
    ): ResponseInterface {
        return $this->client->getHttpClient()->get(
            self::prepareUri($uri, $params),
            $headers
        );
    }

    /**
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @return mixed
     */
    protected function get(string $uri, array $params = [], array $headers = [])
    {
        $response = $this->getAsResponse($uri, $params, $headers);

        return ResponseMediator::getContent($response);
    }

    /**
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @param array<string,string> $files
     * @param array<string,mixed>  $uriParams
     * @return mixed
     */
    protected function post(
        string $uri,
        array $params = [],
        array $headers = [],
        array $files = [],
        array $uriParams = []
    ) {
        if (0 < count($files)) {
            $builder = $this->createMultipartStreamBuilder($params, $files);
            $body = self::prepareMultipartBody($builder);
            $headers = self::addMultipartContentType($headers, $builder);
        } else {
            $body = self::prepareJsonBody($params);

            if (null !== $body) {
                $headers = self::addJsonContentType($headers);
            }
        }

        $response = $this->client->getHttpClient()->post(self::prepareUri($uri, $uriParams), $headers, $body);

        return ResponseMediator::getContent($response);
    }

    /**
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @param array<string,string> $files
     * @return mixed
     */
    protected function put(string $uri, array $params = [], array $headers = [], array $files = [], $query = [])
    {
        if (0 < count($files)) {
            $builder = $this->createMultipartStreamBuilder($params, $files);
            $body = self::prepareMultipartBody($builder);
            $headers = self::addMultipartContentType($headers, $builder);
        } else {
            $body = self::prepareJsonBody($params);

            if (null !== $body) {
                $headers = self::addJsonContentType($headers);
            }
        }
        $response = $this->client->getHttpClient()->put(
            self::prepareUri($uri, $query),
            $headers,
            $body ?? ''
        );

        return ResponseMediator::getContent($response);
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
            $body = self::prepareMultipartBody($builder);
            $headers = self::addMultipartContentType($headers, $builder);
        } else {
            $body = self::prepareJsonBody($params);

            if (null !== $body) {
                $headers = self::addJsonContentType($headers);
            }
        }

        $response = $this->client->getHttpClient()->patch(self::prepareUri($uri), $headers, $body ?? '');

        return ResponseMediator::getContent($response);
    }

    /**
     * @param array<string,string> $headers
     * @param array<string,mixed>  $uriParams
     * @return mixed
     */
    protected function putFile(
        string $uri,
        string $file,
        array $headers = [],
        array $uriParams = []
    ) {
        $resource = self::tryFopen($file, 'r');
        $body = $this->client->getStreamFactory()->createStreamFromResource($resource);

        if ($body->isReadable()) {
            $headers = array_merge(
                [
                    ResponseMediator::CONTENT_TYPE_HEADER => self::guessFileContentType($file),
                ],
                $headers
            );
        }

        $response = $this->client->getHttpClient()->put(self::prepareUri($uri, $uriParams), $headers, $body);

        return ResponseMediator::getContent($response);
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

        return ResponseMediator::getContent($response);
    }

    /**
     * @param int|string $uri
     */
    protected static function encodePath($uri): string
    {
        return rawurlencode((string) $uri);
    }

    /**
     * @param int|string $id
     */
    protected function getProjectPath($id, string $uri): string
    {
        return 'projects/' . self::encodePath($id) . '/' . $uri;
    }

    /**
     * Prepare the request URI.
     *
     * @param array  $query
     */
    protected static function prepareUri(string $uri, array $query = []): string
    {
        $query = array_filter($query, function ($value): bool {
            return null !== $value;
        });

        return rtrim(
            sprintf('%s%s%s', self::URI_PREFIX, $uri, QueryStringBuilder::build($query)),
            "?"
        );
    }

    /**
     * Prepare the request URI.
     *
     * @param array<string,mixed>  $params
     * @param array<string,string> $files
     */
    private function createMultipartStreamBuilder(array $params = [], array $files = []): MultipartStreamBuilder
    {
        $builder = new MultipartStreamBuilder($this->client->getStreamFactory());

        foreach ($params as $name => $value) {
            $builder->addResource($name, $value);
        }

        foreach ($files as $name => $file) {
            $builder->addResource($name, self::tryFopen($file, 'r'), [
                'headers' => [
                    ResponseMediator::CONTENT_TYPE_HEADER => self::guessFileContentType($file),
                ],
                'filename' => basename($file),
            ]);
        }

        return $builder;
    }

    /**
     * Prepare the request multipart body.
     */
    private static function prepareMultipartBody(MultipartStreamBuilder $builder): StreamInterface
    {
        return $builder->build();
    }

    /**
     * Add the multipart content type to the headers if one is not already present.
     *
     * @param array<string,string>   $headers
     * @return array<string,string>
     */
    private static function addMultipartContentType(array $headers, MultipartStreamBuilder $builder): array
    {
        $contentType = sprintf('%s; boundary=%s', ResponseMediator::MULTIPART_CONTENT_TYPE, $builder->getBoundary());

        return array_merge([ResponseMediator::CONTENT_TYPE_HEADER => $contentType], $headers);
    }

    /**
     * Prepare the request JSON body.
     *
     * @param array<string,mixed> $params
     */
    private static function prepareJsonBody(array $params): ?string
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
     * Add the JSON content type to the headers if one is not already present.
     *
     * @param array<string,string> $headers
     * @return array<string,string>
     */
    private static function addJsonContentType(array $headers): array
    {
        return array_merge(
            [
                ResponseMediator::CONTENT_TYPE_HEADER =>
                    ResponseMediator::JSON_CONTENT_TYPE[0]
            ],
            $headers
        );
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
    private static function guessFileContentType(string $file): string
    {
        if (!class_exists(finfo::class, false)) {
            return ResponseMediator::STREAM_CONTENT_TYPE;
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);

        return false !== $type ? $type : ResponseMediator::STREAM_CONTENT_TYPE;
    }
}
