<?php

declare(strict_types=1);

namespace Gubee\SDK;

use Gubee\SDK\Library\HttpClient\Builder;
use Gubee\SDK\Library\HttpClient\Plugin\Authencation;
use Gubee\SDK\Library\HttpClient\Plugin\ExceptionThrower;
use Gubee\SDK\Library\HttpClient\Plugin\History;
use Gubee\SDK\Resource\Catalog\Product\AttributeResource;
use Gubee\SDK\Resource\TokenResource;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\HistoryPlugin;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Gubee
{
    /**
     * @var string The base URL for the Gubee API
     */
    public const BASE_URL = 'https://api.gubee.com.br';

    /**
     * @var string The version of the Gubee PHP SDK
     */
    public const VERSION = '1.0.0';

    /**
     * @var string The user agent for the Gubee PHP SDK
     */
    public const USER_AGENT = 'gubee-php-sdk/' . self::VERSION;

    protected Builder $clientBuilder;

    protected History $responseHistory;

    public function __construct(
        ?Builder $clientBuilder = null,
        ?LoggerInterface $logger = null
    ) {
        if ($clientBuilder === null) {
            $clientBuilder = new Builder();
        }
        if ($logger === null) {
            $logger = new NullLogger();
        }
        $this->responseHistory = new History($logger);
        $this->clientBuilder   = $clientBuilder;
        $this->clientBuilder->addPlugin(
            new HistoryPlugin($this->responseHistory)
        );
        $this->clientBuilder->addPlugin(
            new ExceptionThrower()
        );

        $this->setBaseUrl(self::BASE_URL);
    }

    /**
     * Set the base URL
     */
    public function setBaseUrl(string $url): self
    {
        $uri = $this->getClientBuilder()->getUriFactory()->createUri($url);
        $this->getClientBuilder()->removePlugin(AddHostPlugin::class);
        $this->getClientBuilder()->addPlugin(new AddHostPlugin($uri));
        return $this;
    }

    public function authenticate(string $token)
    {
        $this->getClientBuilder()->removePlugin(Authencation::class);
        $this->getClientBuilder()->addPlugin(new Authencation($token));
    }

    public function token(): TokenResource
    {
        return new TokenResource($this);
    }

    public function attribute(): AttributeResource
    {
        return new AttributeResource($this);
    }

    /**
     * Get the HTTP client
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }

    public function getClientBuilder(): Builder
    {
        return $this->clientBuilder;
    }

    public function setClientBuilder(Builder $clientBuilder): self
    {
        $this->clientBuilder = $clientBuilder;
        return $this;
    }
}
