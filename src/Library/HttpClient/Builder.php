<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Builder
{
    /** @var array<Plugin> */
    private array $plugins = [];

    protected ClientInterface $httpClient;

    protected RequestFactoryInterface $requestFactory;

    protected StreamFactoryInterface $streamFactory;

    public function __construct(
        ?ClientInterface $httpClient = null,
        ?RequestFactoryInterface $requestFactoryInterface = null,
        ?StreamFactoryInterface $streamFactoryInterface = null
    ) {
        $this->httpClient     = $httpClient
            ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactoryInterface
            ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory  = $streamFactoryInterface
            ?: Psr17FactoryDiscovery::findStreamFactory();
    }

    /**
     * Add a plugin to the stack of plugins that will be used to decorate the HTTP client
     */
    public function addPlugin(Plugin $plugin): self
    {
        $this->plugins[] = $plugin;
        return $this;
    }

    /**
     * Remove a plugin from the stack
     */
    public function removePlugin(string $fqcn): self
    {
        foreach ($this->plugins as $key => $plugin) {
            if ($plugin instanceof $fqcn) {
                unset($this->plugins[$key]);
            }
        }

        return $this;
    }

    /**
     * Create a new HTTP client with the plugins added
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        $pluginClient = (new PluginClientFactory())
            ->createClient($this->httpClient, $this->plugins);

        return new HttpMethodsClient(
            $pluginClient,
            $this->requestFactory,
            $this->streamFactory
        );
    }

    /**
     * Get the request factory instance
     */
    public function getRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory;
    }

    /**
     * Set the request factory instance
     */
    public function setRequestFactory(
        RequestFactoryInterface $requestFactoryInterface
    ): self {
        $this->requestFactory = $requestFactoryInterface;
        return $this;
    }

    /**
     * Get the stream factory instance
     */
    public function getStreamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory;
    }

    /**
     * Set the stream factory instance
     */
    public function setStreamFactory(StreamFactoryInterface $streamFactoryInterface): self
    {
        $this->streamFactory = $streamFactoryInterface;
        return $this;
    }
}
