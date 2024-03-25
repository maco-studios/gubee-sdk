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
use Psr\Http\Message\UriFactoryInterface;

use function array_filter;
use function get_class;

class Builder
{
    protected ClientInterface $httpClient;
    protected RequestFactoryInterface $requestFactoryInterface;
    protected StreamFactoryInterface $streamFactoryInterface;
    protected UriFactoryInterface $uriFactoryInterface;
    /** @var array<Plugin> */
    protected array $plugins = [];

    public function __construct(
        ?ClientInterface $httpClient = null,
        ?RequestFactoryInterface $requestFactoryInterface = null,
        ?StreamFactoryInterface $streamFactoryInterface = null,
        ?UriFactoryInterface $uriFactoryInterface = null
    ) {
        $this->httpClient              = $httpClient
        ?: HttpClientDiscovery::find();
        $this->requestFactoryInterface = $requestFactoryInterface
        ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactoryInterface  = $streamFactoryInterface
        ?: Psr17FactoryDiscovery::findStreamFactory();
        $this->uriFactoryInterface     = $uriFactoryInterface
        ?: Psr17FactoryDiscovery::findUriFactory();
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        $pluginClient = (new PluginClientFactory())
            ->createClient($this->httpClient, $this->plugins);

        return new HttpMethodsClient(
            $pluginClient,
            $this->requestFactoryInterface,
            $this->streamFactoryInterface
        );
    }

    /**
     * Add a plugin to the HTTP client.
     *
     * @return Builder
     */
    public function addPlugin(Plugin $plugin): self
    {
        $this->plugins[] = $plugin;
        return $this;
    }

    /**
     * Remove a plugin from the HTTP client.
     *
     * @return Builder
     */
    public function removePlugin(string $fqcn): self
    {
        $this->plugins = array_filter(
            $this->plugins,
            fn(Plugin $plugin) => get_class($plugin) !== $fqcn
        );
        return $this;
    }

    /**
     * @return array<Plugin>
     */
    public function getPlugins(): array
    {
        return $this->plugins;
    }

    public function getRequestFactoryInterface(): RequestFactoryInterface
    {
        return $this->requestFactoryInterface;
    }

    public function getStreamFactoryInterface(): StreamFactoryInterface
    {
        return $this->streamFactoryInterface;
    }

    public function getUriFactoryInterface(): UriFactoryInterface
    {
        return $this->uriFactoryInterface;
    }
}
