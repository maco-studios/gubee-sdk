<?php

declare(strict_types=1);

namespace Gubee\SDK;

use Gubee\SDK\Library\HttpClient\Builder;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Gubee
{
    /**
     * @var string The base URL for the Gubee API
     */
    public const BASE_URL = 'https://api.gubee.com';

    /**
     * @var string The version of the Gubee PHP SDK
     */
    public const VERSION = '1.0.0';

    /**
     * @var string The user agent for the Gubee PHP SDK
     */
    public const USER_AGENT = 'gubee-php-sdk/' . self::VERSION;

    protected Builder $clientBuilder;

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
        $this->clientBuilder = $clientBuilder;
        $this->setBaseUrl(self::BASE_URL);
    }

    /**
     * Set the base URL
     *
     * @return Gubee
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $uri = $this->clientBuilder->getUriFactory()->createUri($baseUrl);

        $this->clientBuilder->addPlugin(
            new BaseUriPlugin(
                $uri
            )
        );
        return $this;
    }

    /**
     * Get the HTTP client
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }
}
