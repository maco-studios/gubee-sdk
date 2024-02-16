<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class Authencation implements Plugin
{

    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }


    /**
     * Handle the request and return the response coming from the next callable.
     *
     * @see http://docs.php-http.org/en/latest/plugins/build-your-own.html
     *
     * @param callable(RequestInterface): Promise $next  Next middleware in the chain, the request is passed as the first argument
     * @param callable(RequestInterface): Promise $first First middleware in the chain, used to to restart a request
     *
     * @return Promise Resolves a PSR-7 Response or fails with an Http\Client\Exception (The same as HttpAsyncClient)
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $request = $request->withHeader(
            "Authorization",
            sprintf("Bearer %s", $this->token)
        );
        return $next($request);
    }

}
