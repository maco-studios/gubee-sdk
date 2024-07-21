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
    protected ?string $token = null;
    protected Client $client;
    protected MockServerConfig $config;
    protected MockServer $server;

    public function createInteraction(
        string $message,
        ConsumerRequest $request,
        ProviderResponse $response
    ): InteractionBuilder {
        $builder = new InteractionBuilder(
            $this->config
        );
        $builder->given($message)
            ->uponReceiving(
                sprintf(
                    "Method: %s, Path: %s",
                    $request->getMethod(),
                    $request->getPath()
                )
            )->with($request)
            ->willRespondWith($response);

        return $builder;
    }

    public function createRequest(
        string $path,
        string $method = 'GET',
        bool $mustBeAuthenticated = true,
        array $body = [],
        array $headers = [],
        array $query = []
    ): ConsumerRequest {
        $request = new ConsumerRequest();
        $request->setMethod($method);
        $request->setPath($path);

        if ($mustBeAuthenticated) {
            if (!$this->token) {
                throw new \Exception('To execute this test, you must authenticate with a token');
            }

            $headers['Authorization'] = sprintf(
                'Bearer %s',
                $this->token
            );
        }
        if (!empty($headers)) {
            $request->setHeaders($headers);
        }
        if (!empty($body)) {
            $request->setBody($body);
        }

        if (!empty($query)) {
            $request->setQuery(
                trim(QueryStringBuilder::build($query), "?")
            );
        }
        return $request;
    }

    public function createResponse(
        int $status = 200,
        array $headers = [],
        array $body = []
    ): ProviderResponse {
        $response = new ProviderResponse();
        $response->setStatus($status);

        if (!empty($headers)) {
            $response->setHeaders($headers);
        }

        if (!empty($body)) {
            $response->setBody($body);
        }

        return $response;
    }

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
