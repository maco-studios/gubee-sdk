<?php

declare(strict_types=1);

/**
 * Copyright (c) 2024 MACO Studios & Gubee
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/maco-studios/gubee-sdk
 *
 */

namespace Gubee\SDK\Tests\Unit\Library\HttpClient\Plugin;

use Gubee\SDK\Library\HttpClient\Plugin\History;
use Http\Client\Common\Exception\ClientErrorException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class HistoryTest extends TestCase
{
    private LoggerInterface $logger;
    private History $history;

    protected function setUp(): void
    {
        $this->logger  = $this->createMock(LoggerInterface::class);
        $this->history = new History($this->logger);
    }

    public function testAddSuccess()
    {
        $request  = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);

        $response->method('getStatusCode')->willReturn(200);
        $response->method('getReasonPhrase')->willReturn('OK');

        $this->logger->expects($this->once())
            ->method('info')
            ->with(
                $this->equalTo('HTTP 200 OK'),
                $this->arrayHasKey('request')
            );

        $this->history->addSuccess($request, $response);

        $this->assertSame($response, $this->history->getLastResponse());
    }

    public function testAddFailure()
    {
        $request   = $this->createMock(RequestInterface::class);
        $response  = $this->createMock(ResponseInterface::class);
        $exception = new ClientErrorException('Client error', $request, $response);

        $this->logger->expects($this->once())
            ->method('error')
            ->with(
                $this->equalTo('Client error'),
                $this->arrayHasKey('request')
            );

        $this->history->addFailure($request, $exception);
    }

    public function testGetLastResponseReturnsNullInitially()
    {
        $this->assertNull($this->history->getLastResponse());
    }
}
