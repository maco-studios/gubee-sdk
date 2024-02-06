<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient;

use Psr\Http\Message\ResponseInterface;

use function in_array;
use function is_array;
use function json_decode;

class ResponseHandler
{
    /**
     * @var array<string> Supported content types
     */
    public const CONTENT_TYPES = [
        'application/json',
        'application/hal+json',
        'application/octet-stream',
        'multipart/form-data',
    ];

    /**
     * @var string HTTP header for content type
     */
    public const CONTENT_TYPE_HEADER = 'Content-Type';

    /**
     * Returns the content of the response
     *
     * @return mixed
     */
    public static function getContent(ResponseInterface $response)
    {
        $contentType = $response->getHeaderLine(self::CONTENT_TYPE_HEADER);
        $body        = (string) $response->getBody();
        if (in_array($contentType, self::CONTENT_TYPES)) {
            return json_decode(
                $body,
                true
            );
        }
        return $body;
    }

    /**
     * Returns the error message from the response
     */
    public static function getErrorMessage(ResponseInterface $response): ?string
    {
        $content = self::getContent($response);
        if (is_array($content) && isset($content['message'])) {
            return $content['message'];
        }
        return null;
    }
}
