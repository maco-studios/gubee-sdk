<?php

declare(strict_types=1);

namespace Gubee\SDK;

use Gubee\SDK\Api\ServiceProviderInterface;
use Gubee\SDK\Library\HttpClient\Builder;
use Gubee\SDK\Library\ObjectManager\ServiceProvider;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Client
{
    public const USER_AGENT = 'gubee-sdk/' . self::VERSION;
    public const VERSION    = '1.0.0';
    public const BASE_URI   = 'https://api.gubee.com.br';

    protected ServiceProviderInterface $serviceProvider;
    protected LoggerInterface $logger;
    protected Builder $httpClientBuilder;

    public function __construct(
        ?ServiceProviderInterface $serviceProvider = null,
        ?LoggerInterface $logger = null,
        ?Builder $httpClientBuilder = null,
        int $retryCount = 3
    ) {
        $this->serviceProvider   = $serviceProvider ?? new ServiceProvider();
        $this->logger            = $logger ?? new NullLogger();
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();
        $this->httpClientBuilder->addPlugin(
            new RetryPlugin(
                [
                    'retries' => $retryCount,
                ]
            )
        );
        $this->httpClientBuilder->addPlugin(
            new HeaderDefaultsPlugin([
                'User-Agent' => self::USER_AGENT,
            ])
        );
        $this->setUrl(self::BASE_URI);
    }

    /**
     * Set the base URL for the client.
     */
    public function setUrl(string $url): self
    {
        $uri = $this->httpClientBuilder->getUriFactory()
            ->createUri($url);

        $this->httpClientBuilder->removePlugin(
            BaseUriPlugin::class
        )->addPlugin(
            new BaseUriPlugin($uri)
        );
        return $this;
    }

    public function getServiceProvider(): ServiceProviderInterface
    {
        return $this->serviceProvider;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function getHttpClientBuilder(): Builder
    {
        return $this->httpClientBuilder;
    }
}
