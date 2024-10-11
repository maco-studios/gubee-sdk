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

namespace Gubee\SDK\Library\HttpClient;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\Cache\Generator\HeaderCacheKeyGenerator;
use Http\Client\Common\Plugin\CachePlugin;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

class ClientBuilder
{
    protected ClientInterface $client;

    protected RequestFactoryInterface $requestFactory;

    protected StreamFactoryInterface $streamFactory;

    protected UriFactoryInterface $uriFactory;

    /** @var array<Plugin> */
    protected array $plugins = [];

    protected ?CachePlugin $cachePlugin = null;

    protected ?HttpMethodsClientInterface $pluginClient = null;

    public function __construct(
        ?ClientInterface $client = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
        ?UriFactoryInterface $uriFactory = null
    ) {
        $this->client = $client
            ?: Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory
            ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory
            ?: Psr17FactoryDiscovery::findStreamFactory();
        $this->uriFactory = $uriFactory
            ?: Psr17FactoryDiscovery::findUriFactory();
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        if (null === $this->pluginClient) {
            if (null !== $this->cachePlugin) {
                $this->addPlugin($this->cachePlugin);
            }
            $plugins = $this->plugins;
            $this->pluginClient = new HttpMethodsClient(
                (new PluginClientFactory())
                    ->createClient(
                        $this->client,
                        $plugins
                    ),
                $this->requestFactory,
                $this->streamFactory
            );
        }

        return $this->pluginClient;
    }

    /**
     * Get the request factory.
     */
    public function getRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory;
    }

    /**
     * Get the stream factory.
     */
    public function getStreamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory;
    }

    /**
     * Get the URI factory.
     */
    public function getUriFactory(): UriFactoryInterface
    {
        return $this->uriFactory;
    }

    /**
     * Add a new plugin to the end of the plugin chain.
     */
    public function addPlugin(Plugin $plugin): void
    {
        $this->plugins[] = $plugin;
        $this->pluginClient = null;
    }

    /**
     * Remove a plugin by its fully qualified class name (FQCN).
     */
    public function removePlugin(string $fqcn): void
    {
        foreach ($this->plugins as $idx => $plugin) {
            if ($plugin instanceof $fqcn) {
                unset($this->plugins[$idx]);
                $this->pluginClient = null;
            }
        }
    }

    public function getPlugins(): array
    {
        return $this->plugins;
    }


    /**
     * Add a cache plugin to cache responses locally.
     *
     * @param array                  $config
     */
    public function addCache(
        CacheItemPoolInterface $cachePool,
        array $config = []
    ): void {
        if (!isset($config['cache_key_generator'])) {
            $config['cache_key_generator'] = new HeaderCacheKeyGenerator(
                [
                    'Authorization',
                    'Cookie',
                    'Accept',
                    'Content-type',
                ]
            );
        }

        $this->cachePlugin = CachePlugin::clientCache(
            $cachePool,
            $this->streamFactory,
            $config
        );
        $this->pluginClient = null;
    }

    /**
     * Remove the cache plugin.
     */
    public function removeCache(): void
    {
        $this->cachePlugin = null;
        $this->pluginClient = null;
    }
}
