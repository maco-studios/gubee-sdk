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
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\CachePlugin;
use PHPUnit\Framework\TestCase;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

use function get_class;

class ClientBuilderTest extends TestCase
{
    public function testGetHttpClient()
    {
        $clientBuilder = new ClientBuilder();
        $httpClient = $clientBuilder->getHttpClient();

        $this->assertInstanceOf(HttpMethodsClient::class, $httpClient);
    }

    public function testAddPlugin()
    {
        $plugin = $this->createMock(Plugin::class);
        $clientBuilder = new ClientBuilder();
        $clientBuilder->addPlugin($plugin);

        $httpClient = $clientBuilder->getHttpClient();
        $this->assertInstanceOf(HttpMethodsClient::class, $httpClient);
        /**
         * Walk into every single plugin and check if the plugin is the same as the one we added
         */
        $has = false;
        foreach ($clientBuilder->getPlugins() as $addedPlugin) {
            if (get_class($addedPlugin) === get_class($plugin)) {
                $has = true;
                break;
            }
        }
        $this->assertTrue($has, 'The plugin was not added');
    }

    public function testRemovePlugin()
    {
        $plugin = $this->createMock(Plugin::class);
        $clientBuilder = new ClientBuilder();
        $clientBuilder->addPlugin($plugin);
        $clientBuilder->removePlugin(get_class($plugin));

        $httpClient = $clientBuilder->getHttpClient();
        $this->assertInstanceOf(HttpMethodsClient::class, $httpClient);
        /**
         * Walk into every single plugin and check if the plugin is the same as the one we added
         */
        $has = false;
        foreach ($clientBuilder->getPlugins() as $addedPlugin) {
            if (get_class($addedPlugin) === get_class($plugin)) {
                $has = true;
                break;
            }
        }
        $this->assertFalse($has, 'The plugin was not removed');
    }

    public function testAddCache()
    {
        $cachePool = $this->createMock(CacheItemPoolInterface::class);
        $clientBuilder = new ClientBuilder();
        $clientBuilder->addCache($cachePool);

        $httpClient = $clientBuilder->getHttpClient();
        $this->assertInstanceOf(HttpMethodsClient::class, $httpClient);
        $hasCachePlugin = false;
        foreach ($clientBuilder->getPlugins() as $plugin) {
            if ($plugin instanceof CachePlugin) {
                $hasCachePlugin = true;
                break;
            }
        }
        $this->assertTrue($hasCachePlugin, 'The cache plugin was not added');
    }

    public function testRemoveCache()
    {
        $cachePool = $this->createMock(CacheItemPoolInterface::class);
        $clientBuilder = new ClientBuilder();
        $clientBuilder->addCache($cachePool);
        $clientBuilder->removeCache();

        $httpClient = $clientBuilder->getHttpClient();
        $this->assertInstanceOf(HttpMethodsClient::class, $httpClient);
        $hasCachePlugin = false;
        foreach ($clientBuilder->getPlugins() as $plugin) {
            if ($plugin instanceof CachePlugin) {
                $hasCachePlugin = true;
                break;
            }
        }
        $this->assertFalse($hasCachePlugin, 'The cache plugin was not removed');
    }

    public function testGetRequestFactory()
    {
        $clientBuilder = new ClientBuilder();
        $requestFactory = $clientBuilder->getRequestFactory();

        $this->assertInstanceOf(RequestFactoryInterface::class, $requestFactory);
    }

    public function testGetStreamFactory()
    {
        $clientBuilder = new ClientBuilder();
        $streamFactory = $clientBuilder->getStreamFactory();

        $this->assertInstanceOf(StreamFactoryInterface::class, $streamFactory);
    }

    public function testGetUriFactory()
    {
        $clientBuilder = new ClientBuilder();
        $uriFactory = $clientBuilder->getUriFactory();

        $this->assertInstanceOf(UriFactoryInterface::class, $uriFactory);
    }
}
