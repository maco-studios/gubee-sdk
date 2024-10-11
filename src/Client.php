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
use Http\Client\Common\HttpMethodsClientInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Client
{
    protected ClientBuilder $httpClientBuilder;
    protected LoggerInterface $logger;

    public function __construct(
        ?ClientBuilder $clientBuilder = null,
        ?LoggerInterface $logger = null
    ) {
        $this->httpClientBuilder = $clientBuilder ?: new ClientBuilder();
        $this->logger = $logger ?: new NullLogger();
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

    /**
     * @return LoggerInterface
     */
    public function getLogger(): \Psr\Log\LoggerInterface
    {
        return $this->logger;
    }
}
