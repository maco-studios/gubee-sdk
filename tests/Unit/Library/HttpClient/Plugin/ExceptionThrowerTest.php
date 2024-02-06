<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Unit\Library\HttpClient\Plugin;

use Gubee\SDK\Library\HttpClient\Exception\ErrorException;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\RequestTimeoutException;
use Gubee\SDK\Library\HttpClient\Exception\TooManyRequestsException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;
use Gubee\SDK\Library\HttpClient\Plugin\ExceptionThrower;
use Http\Client\Promise\HttpFulfilledPromise;
use Http\Promise\Promise;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ExceptionThrowerTest extends TestCase
{
    protected RequestInterface $requestMock;
    protected ResponseInterface $responseMock;

    protected function setUp(): void
    {
        $this->requestMock  = $this->createMock(RequestInterface::class);
        $this->responseMock = $this->createMock(ResponseInterface::class);
    }

    /**
     * @dataProvider statusProvider
     * @return array<int, array<int, class-string>>
     */
    public function statusProvider()
    {
        return [
            [401, UnauthorizedException::class],
            [403, ForbiddenException::class],
            [404, NotFoundException::class],
            [408, RequestTimeoutException::class],
            [429, TooManyRequestsException::class],
            [500, ErrorException::class],
            [400, ErrorException::class],
        ];
    }

    /**
     * @dataProvider statusProvider
     */
    public function testHandleRequestWithExceptions(int $statusCode, string $expectedException)
    {
        $this->responseMock->method('getStatusCode')->willReturn($statusCode);
        $this->responseMock->method('getReasonPhrase')->willReturn('Error');

        $plugin = new ExceptionThrower();

        $next = function () {
            return new HttpFulfilledPromise($this->responseMock);
        };

        $this->expectException($expectedException);

        $plugin->handleRequest($this->requestMock, $next, $next);
    }

    public function testHandleRequestWithoutException()
    {
        $this->responseMock->method('getStatusCode')->willReturn(200);

        $plugin = new ExceptionThrower();

        $next = function () {
            return new HttpFulfilledPromise($this->responseMock);
        };

        $promise = $plugin->handleRequest($this->requestMock, $next, $next);

        $this->assertInstanceOf(Promise::class, $promise);
        $this->assertSame($this->responseMock, $promise->wait());
    }
}
