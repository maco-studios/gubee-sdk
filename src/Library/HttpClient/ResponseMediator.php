<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient;

use Psr\Http\Message\ResponseInterface;
use RuntimeException;

use function array_shift;
use function array_unique;
use function count;
use function explode;
use function implode;
use function in_array;
use function is_array;
use function is_int;
use function is_string;
use function json_decode;
use function preg_match;
use function sprintf;
use function trim;

class ResponseMediator
{
    /**
     * The content type header.
     *
     * @var string
     */
    public const CONTENT_TYPE_HEADER = 'Content-Type';

    /**
     * The JSON content type identifier.
     *
     * @var array<string>
     */
    public const JSON_CONTENT_TYPE = [
        'application/json',
        'application/hal+json',
        'application/problem+json',
    ];

    /**
     * The octet stream content type identifier.
     *
     * @var string
     */
    public const STREAM_CONTENT_TYPE = 'application/octet-stream';

    /**
     * The multipart form data content type identifier.
     *
     * @var string
     */
    public const MULTIPART_CONTENT_TYPE = 'multipart/form-data';

    /**
     * Return the response body as a string or JSON array if content type is JSON.
     *
     * @return array|string
     */
    public static function getContent(ResponseInterface $response)
    {
        $body = (string) $response->getBody();

        if (
            ! in_array($body, ['', 'null', 'true', 'false'], true)
            &&
            in_array(
                $response->getHeaderLine(self::CONTENT_TYPE_HEADER),
                self::JSON_CONTENT_TYPE
            )
        ) {
            return json_decode($body, true);
        }

        return $body;
    }

    /**
     * Extract pagination URIs from Link header.
     *
     * @return array<string,string>
     */
    public static function getPagination(ResponseInterface $response): array
    {
        $header = self::getHeader($response, 'Link');

        if (null === $header) {
            return [];
        }

        $pagination = [];
        foreach (explode(',', $header) as $link) {
            preg_match('/<(.*)>; rel="(.*)"/i', trim($link, ','), $match);

            if (3 === count($match)) {
                $pagination[$match[2]] = $match[1];
            }
        }

        return $pagination;
    }

    /**
     * Get the value for a single header.
     */
    private static function getHeader(ResponseInterface $response, string $name): ?string
    {
        $headers = $response->getHeader($name);

        return array_shift($headers);
    }

    /**
     * Get the error message from the response if present.
     */
    public static function getErrorMessage(ResponseInterface $response): ?string
    {
        try {
            $content = self::getContent($response);
        } catch (RuntimeException $e) {
            return null;
        }

        if (! is_array($content)) {
            return null;
        }

        if (isset($content['message'])) {
            $message = $content['message'];

            if (is_string($message)) {
                return $message;
            }

            if (is_array($message)) {
                return self::getMessageAsString($content['message']);
            }
        }

        if (isset($content['error_description'])) {
            $error = $content['error_description'];

            if (is_string($error)) {
                return $error;
            }
        }

        if (isset($content['error'])) {
            $error = $content['error'];

            if (is_string($error)) {
                return $error;
            }
        }

        return null;
    }

    /**
     * @param array $message
     */
    private static function getMessageAsString(array $message): string
    {
        $format = '"%s" %s';
        $errors = [];

        foreach ($message as $field => $messages) {
            if (is_array($messages)) {
                $messages = array_unique($messages);
                foreach ($messages as $error) {
                    $errors[] = sprintf($format, $field, $error);
                }
            } elseif (is_int($field)) {
                $errors[] = $messages;
            } else {
                $errors[] = sprintf($format, $field, $messages);
            }
        }

        return implode(', ', $errors);
    }
}
