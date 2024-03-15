<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient\Plugin;

use Gubee\SDK\Library\HttpClient\Exception\BadGatewayException;
use Gubee\SDK\Library\HttpClient\Exception\ConflictException;
use Gubee\SDK\Library\HttpClient\Exception\ErrorException;
use Gubee\SDK\Library\HttpClient\Exception\ExceptionInterface;
use Gubee\SDK\Library\HttpClient\Exception\GatewayTimeoutException;
use Gubee\SDK\Library\HttpClient\Exception\InternalServerErrorException;
use Gubee\SDK\Library\HttpClient\Exception\MethodNotAllowedException;
use Gubee\SDK\Library\HttpClient\Exception\NotAcceptableException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\NotImplementedException;
use Gubee\SDK\Library\HttpClient\Exception\ServiceUnavailableException;
use Gubee\SDK\Library\HttpClient\Exception\TooManyRequestsException;
use Gubee\SDK\Library\HttpClient\Exception\UnprocessableEntityException;
use Gubee\SDK\Library\HttpClient\Exception\UnsupportedMediaTypeException;
use Http\Promise\Promise;
use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\BadRequestException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;

class Thrower implements Plugin
{


    /**
     * Handle the request and return the response coming from the next callable.
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(
            function (ResponseInterface $response) use (&$request): ResponseInterface {
                $status = $response->getStatusCode();
                if ($status >= 400 && $status < 600) {
                    throw self::createException(
                        $status,
                        (string) $response->getBody(),
                        $request,
                        $response
                    );
                }

                return $response;
            }
        );
    }

    public static function createException(
        int $statusCode,
        string $responseMessage,
        RequestInterface $request,
        ResponseInterface $response
    ): ExceptionInterface
    {
        $responseMessage = json_decode(
            (string) $responseMessage,
            true
        );

        switch ($responseMessage['message']) {
            case 'error.brand.notfound':
                $responseMessage = $responseMessage['title'];
                $statusCode = 404;
                break;
            case 'error.validation.text':
                $responseMessage = sprintf(
                    "Object validation failed:\n%s",
                    implode(
                        PHP_EOL,
                        array_map(
                            function ($error) {
                                return sprintf(
                                    "%s:%s: %s",
                                    $error['objectName'],
                                    $error['field'],
                                    $error['message']
                                );
                            },
                            $responseMessage['fieldErrors']
                        )
                    )
                );
                break;
            default:
                $responseMessage = $responseMessage['message'];
        }

        switch ($statusCode) {
            case 400:
                return new BadRequestException($request, $response, $responseMessage, $statusCode);
            case 401:
                return new UnauthorizedException($request, $response, $responseMessage, $statusCode);
            case 403:
                return new ForbiddenException($request, $response, $responseMessage, $statusCode);
            case 404:
                return new NotFoundException($request, $response, $responseMessage, $statusCode);
            case 405:
                return new MethodNotAllowedException($request, $response, $responseMessage, $statusCode);
            case 406:
                return new NotAcceptableException($request, $response, $responseMessage, $statusCode);
            case 409:
                return new ConflictException($request, $response, $responseMessage, $statusCode);
            case 415:
                return new UnsupportedMediaTypeException($request, $response, $responseMessage, $statusCode);
            case 422:
                return new UnprocessableEntityException($request, $response, $responseMessage, $statusCode);
            case 429:
                return new TooManyRequestsException($request, $response, $responseMessage, $statusCode);
            case 500:
                return new InternalServerErrorException($request, $response, $responseMessage, $statusCode);
            case 501:
                return new NotImplementedException($request, $response, $responseMessage, $statusCode);
            case 502:
                return new BadGatewayException($request, $response, $responseMessage, $statusCode);
            case 503:
                return new ServiceUnavailableException($request, $response, $responseMessage, $statusCode);
            case 504:
                return new GatewayTimeoutException($request, $response, $responseMessage, $statusCode);
            default:
                return new ErrorException($request, $response, $responseMessage, $statusCode);
        }
    }
}