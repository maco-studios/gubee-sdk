<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Unit\Library\HttpClient;

use Gubee\SDK\Library\HttpClient\Builder;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

class BuilderTest extends TestCase
{
    private ClientInterface $clientMock;
    private RequestFactoryInterface $requestFactoryMock;
    private StreamFactoryInterface $streamFactoryMock;

    protected function setUp(): void
    {
        $this->clientMock         = $this->createMock(ClientInterface::class);
        $this->requestFactoryMock = $this->createMock(RequestFactoryInterface::class);
        $this->streamFactoryMock  = $this->createMock(StreamFactoryInterface::class);
    }

    public function testConstructor()
    {
        $builder = new Builder($this->clientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $this->assertInstanceOf(Builder::class, $builder);
    }

    public function testAddPlugin()
    {
        $pluginMock = $this->createMock(Plugin::class);
        $builder    = new Builder($this->clientMock, $this->requestFactoryMock, $this->streamFactoryMock);

        $builder->addPlugin($pluginMock);
        $this->assertInstanceOf(Builder::class, $builder);
        $this->assertContains($pluginMock, $builder->getPlugins());
    }

    public function testRemovePlugin()
    {
        $pluginMock = $this->getMockBuilder(Plugin::class)->getMock();
        $fqcn       = $pluginMock::class;

        $builder = new Builder($this->clientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $builder->addPlugin($pluginMock);
        $builder->removePlugin($fqcn);
        $this->assertInstanceOf(Builder::class, $builder);
        $this->assertEmpty($builder->getPlugins());
    }

    public function testGetHttpClient()
    {
        $builder    = new Builder($this->clientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $httpClient = $builder->getHttpClient();

        $this->assertInstanceOf(HttpMethodsClientInterface::class, $httpClient);
    }

    public function testUriFactory()
    {
        $builder = new Builder($this->clientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $uri     = $builder->getUriFactory();

        $this->assertInstanceOf(UriFactoryInterface::class, $uri);
    }
}
