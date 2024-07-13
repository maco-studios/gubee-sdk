<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource;

use Gubee\SDK\Client;
use Gubee\SDK\Library\HttpClient\QueryStringBuilder;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PhpPact\Standalone\MockService\MockServer;
use PhpPact\Standalone\MockService\MockServerConfig;
use PHPUnit\Framework\TestCase;

abstract class AbstractResource extends TestCase
{
    protected bool $mustBeAuthenticated = true;
    protected string $token;
    protected Client $client;
    protected MockServerConfig $config;
    protected MockServer $server;

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

        $this->client = new Client();
        $this->client->setUrl(
            (string) $this->config->getBaseUri()->withPath('')
        );
    }

    protected function tearDown(): void
    {
        $this->server->stop();
        unset($this->client, $this->server, $this->config);
    }

    public function prepareInteractionBuilder(
        string $message,
        ConsumerRequest $request,
        ProviderResponse $response
    ): InteractionBuilder {
        $builder = new InteractionBuilder($this->config);
        $builder
            ->uponReceiving($message)
            ->with($request)
            ->willRespondWith($response);

        $this->client->setUrl(
            (string) $this->config->getBaseUri()->withPath('')
        );

        return $builder;
    }

    /**
     * @param array<int|string, mixed> $headers
     * @param array<mixed, mixed> $query
     */
    public function createRequest(
        string $uri,
        string $method = 'GET',
        array $headers = [],
        array $query = []
    ): ConsumerRequest {
        $request = new ConsumerRequest();

        if (!empty($headers)) {
            $request->setHeaders($headers);
        }

        if (!empty($query)) {
            $uri .= QueryStringBuilder::build($query);
        }

        if ($this->mustBeAuthenticated) {
            $request->setHeaders([
                "Authorization" => sprintf(
                    "Bearer %s",
                    $this->token
                )
            ]);
        }

        $request
            ->setMethod($method)
            ->setPath($uri);

        return $request;
    }

    /**
     * @param array<int|string, mixed> $headers
     * @param array<mixed, mixed> $body
     */
    public function createResponse(
        int $status,
        array $body = [],
        array $headers = []
    ): ProviderResponse {
        $response = new ProviderResponse();
        if (!empty($headers)) {
            $response->setHeaders($headers);
        }
        if (!empty($body)) {
            $response->setBody($body);
        }
        $response->setStatus($status);
        return $response;
    }

    /**
     * @return MockServerConfig
     */
    public function getConfig(): MockServerConfig
    {
        return $this->config;
    }

    /**
     * @param MockServerConfig $config 
     * @return self
     */
    public function setConfig(MockServerConfig $config): self
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client 
     * @return self
     */
    public function setClient(Client $client): self
    {
        $this->client = $client;
        return $this;
    }
}
