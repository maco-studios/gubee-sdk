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

namespace Gubee\SDK\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Gubee\SDK\Client;
use Gubee\SDK\Library\HttpClient\ClientBuilder;
use Http\Client\Common\HttpMethodsClientInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;


class ClientTest extends TestCase
{
    public function testConstructorInitializesProperties()
    {
        $clientBuilder = $this->createMock(ClientBuilder::class);
        $logger = $this->createMock(LoggerInterface::class);

        $client = new Client($clientBuilder, $logger);

        $this->assertSame($clientBuilder, $client->getHttpClientBuilder());
        $this->assertSame($logger, $client->getLogger());
    }

    public function testConstructorInitializesDefaultProperties()
    {
        $client = new Client();

        $this->assertInstanceOf(ClientBuilder::class, $client->getHttpClientBuilder());
        $this->assertInstanceOf(NullLogger::class, $client->getLogger());
    }

    public function testCreateWithHttpClient()
    {
        $httpClient = $this->createMock(ClientInterface::class);
        $client = Client::createWithHttpClient($httpClient);

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(ClientBuilder::class, $client->getHttpClientBuilder());
    }

    public function testGetHttpClient()
    {
        $httpClient = $this->createMock(HttpMethodsClientInterface::class);
        $clientBuilder = $this->createMock(ClientBuilder::class);
        $clientBuilder->method('getHttpClient')->willReturn($httpClient);

        $client = new Client($clientBuilder);

        $this->assertSame($httpClient, $client->getHttpClient());
    }

    public function testGetStreamFactory()
    {
        $streamFactory = $this->createMock(StreamFactoryInterface::class);
        $clientBuilder = $this->createMock(ClientBuilder::class);
        $clientBuilder->method('getStreamFactory')->willReturn($streamFactory);

        $client = new Client($clientBuilder);

        $this->assertSame($streamFactory, $client->getStreamFactory());
    }

    public function testGetHttpClientBuilder()
    {
        $clientBuilder = $this->createMock(ClientBuilder::class);
        $client = new Client($clientBuilder);

        $this->assertSame($clientBuilder, $client->getHttpClientBuilder());
    }
}
