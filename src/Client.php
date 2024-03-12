<?php

declare(strict_types=1);

namespace Gubee\SDK;

use Gubee\SDK\Api\ServiceProviderInterface;
use Gubee\SDK\Library\HttpClient\Builder;
use Gubee\SDK\Library\HttpClient\Plugin\Authenticate;
use Gubee\SDK\Library\HttpClient\Plugin\Journal\History;
use Gubee\SDK\Library\ObjectManager\ServiceProvider;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\HistoryPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
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
        $history                 = new History($logger);
        $this->httpClientBuilder->addPlugin(
            new HistoryPlugin($history)
        );
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

    public function authenticate(string $token): self
    {
        $this->httpClientBuilder->removePlugin(
            Authenticate::class
        )->addPlugin(
            new Authenticate($token)
        );
        return $this;
    }

    /**
     * Get the HTTP client.
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getClient();
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

    public function getStreamFactory(): StreamFactoryInterface
    {
        return $this->httpClientBuilder->getStreamFactory();
    }

    public function getRequestFactory(): RequestFactoryInterface
    {
        return $this->httpClientBuilder->getRequestFactory();
    }
}
