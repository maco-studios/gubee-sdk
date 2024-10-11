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

namespace Gubee\SDK;

use Gubee\SDK\Library\HttpClient\ClientBuilder;
use Gubee\SDK\Library\HttpClient\Plugin\History;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\DecoderPlugin;
use Http\Client\Common\Plugin\HistoryPlugin;
use Http\Client\Common\Plugin\Journal;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Client
{
    protected ClientBuilder $httpClientBuilder;
    protected LoggerInterface $logger;
    protected Journal $responseHistory;

    public function __construct(
        ?ClientBuilder $clientBuilder = null,
        ?LoggerInterface $logger = null
    ) {
        $this->httpClientBuilder = $clientBuilder ?: new ClientBuilder();
        $this->logger            = $logger ?: new NullLogger();
        $this->responseHistory   = new History($this->logger);

        $this->httpClientBuilder->addPlugin(
            new HistoryPlugin($this->responseHistory)
        );
        $this->httpClientBuilder->addPlugin(new DecoderPlugin());
    }

    public function setUrl(string $url): self
    {
        $this->httpClientBuilder->addPlugin(
            new BaseUriPlugin(
                $this->httpClientBuilder->getUriFactory()->createUri($url)
            )
        );
        return $this;
    }

    /**
     * Create a Gitlab\Client using an HTTP client.
     *
     * @return Client
     */
    public static function createWithHttpClient(ClientInterface $httpClient): self
    {
        $builder = new ClientBuilder($httpClient);
        return new self($builder);
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    public function getStreamFactory(): StreamFactoryInterface
    {
        return $this->httpClientBuilder->getStreamFactory();
    }

    public function getHttpClientBuilder(): ClientBuilder
    {
        return $this->httpClientBuilder;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}
