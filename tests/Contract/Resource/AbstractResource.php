<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource;

use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PHPUnit\Framework\TestCase;

use PhpPact\Standalone\MockService\MockServer;
use PhpPact\Standalone\MockService\MockServerConfig;
use PhpPact\Standalone\MockService\MockServerEnvConfig;

abstract class AbstractResource extends TestCase
{

    /** @var MockServerConfig */
    private MockServerConfig $config;

    private MockServer $server;
    protected function setUp(): void
    {
        $this->config = new MockServerConfig();
        $this->config->setHost('localhost');
        $this->config->setPort(7201);
        $this->config->setConsumer('GubeeConsumer');
        $this->config->setProvider('GubeeProvider');
        $this->config->setHealthCheckTimeout(1);
        $this->config->setHealthCheckRetrySec(1);
        $this->config->setCors(true);
        $this->server = new MockServer($this->config);
        $this->server->start();
    }

    protected function tearDown(): void
    {
        $this->server->stop();
    }

    public function createRequest(
        string $uri,
        string $method = 'GET',
        array $headers = [],
        array $query = []
    ): ConsumerRequest {
        $request = new ConsumerRequest();
        $request
            ->setMethod($method)
            ->setPath($uri)
            ->setHeaders($headers);
        return $request;
    }

    public function createResponse(
        int $status,
        array $headers = [],
        array $body = []
    ): ProviderResponse {
        $response = new ProviderResponse();
        $response
            ->setStatus($status)
            ->setHeaders($headers)
            ->setBody($body);
        return $response;
    }
}
