<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient\Plugin;

use Gubee\SDK\Library\HttpClient\Exception\ErrorException;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\RequestTimeoutException;
use Gubee\SDK\Library\HttpClient\Exception\TooManyRequestsException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;
use Gubee\SDK\Library\HttpClient\ResponseHandler;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ExceptionThrower implements Plugin
{
    /**
     * Handle the request and return the response coming from the next callable.
     *
     * @see http://docs.php-http.org/en/latest/plugins/build-your-own.html
     *
     * @param callable(RequestInterface): Promise $next  Next middleware in the
     *      chain, the request is passed as the first argument
     * @param callable(RequestInterface): Promise $first First middleware in
     *      the chain, used to to restart a request
     *
     * @return Promise Resolves a PSR-7 Response or fails with an
     *      Http\Client\Exception (The same as HttpAsyncClient)
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(
            function (ResponseInterface $response) use ($request): ResponseInterface {
                $status = $response->getStatusCode();

                if ($status >= 400) {
                    throw self::createException(
                        $status,
                        ResponseHandler::getErrorMessage($response)
                            ?: $response->getReasonPhrase(),
                        $request,
                        $response
                    );
                }

                return $response;
            }
        );
    }

    /**
     * Create an exception based on the status code and message.
     */
    public static function createException(
        int $code,
        string $message,
        RequestInterface $request,
        ResponseInterface $response
    ): ErrorException {
        switch ($code) {
            case 401:
                return new UnauthorizedException($request, $response, $message, $code);
            case 403:
                return new ForbiddenException($request, $response, $message, $code);
            case 404:
                return new NotFoundException($request, $response, $message, $code);
            case 408:
                return new RequestTimeoutException($request, $response, $message, $code);
            case 429:
                return new TooManyRequestsException($request, $response, $message, $code);
            case 500:
            case 400:
            default:
                return new ErrorException($request, $response, $message, $code);
        }
    }
}
