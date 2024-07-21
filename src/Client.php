<?php

declare(strict_types=1);

namespace Gubee\SDK;

use Gubee\SDK\Library\HttpClient\Builder;
use Gubee\SDK\Library\HttpClient\Plugin\Authenticate;
use Gubee\SDK\Library\HttpClient\Plugin\Journal\History;
use Gubee\SDK\Library\HttpClient\Plugin\Thrower;
use Gubee\SDK\Resource\Catalog\AttributeResource;
use Gubee\SDK\Resource\Catalog\BrandResource;
use Gubee\SDK\Resource\Catalog\CategoryResource;
use Gubee\SDK\Resource\TokenResource;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\HistoryPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Throwable;

use function in_array;

class Client
{
    public const USER_AGENT = 'gubee-sdk/' . self::VERSION;
    public const VERSION = '1.0.0';
    public const BASE_URI = 'https://api.gubee.com.br';

    protected LoggerInterface $logger;
    protected Builder $httpClientBuilder;
    protected History $responseHistory;

    public function __construct(
        ?LoggerInterface $logger = null,
        ?Builder $httpClientBuilder = null,
        int $retryCount = 3
    ) {
        $this->logger = $logger ?? new NullLogger();
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();
        $this->responseHistory = new History($this->logger);
        $this->httpClientBuilder->addPlugin(
            new HistoryPlugin($this->responseHistory)
        );
        $this->httpClientBuilder->addPlugin(
            new RetryPlugin([
                'retries' => $retryCount,
                'exception_decider' => function (RequestInterface $request, Throwable $exception) {
                    $this->shouldRetry($request, $exception);
                },
            ])
        );

        $this->httpClientBuilder->addPlugin(
            new Thrower($this->logger)
        );
        $this->httpClientBuilder->addPlugin(
            new HeaderDefaultsPlugin([
                'User-Agent' => self::USER_AGENT,
            ])
        );
        $this->setUrl(self::BASE_URI);
    }

    public function token(): TokenResource
    {
        return new TokenResource($this);
    }

    public function attribute(): AttributeResource
    {
        return new AttributeResource($this);
    }

    public function category(): CategoryResource
    {
        return new CategoryResource($this);
    }

    public function brand(): BrandResource
    {
        return new BrandResource($this);
    }

    private function shouldRetry(RequestInterface $request, Throwable $exception): bool
    {
        /**
         * The list of HTTP status codes that should trigger a retry.
         *
         * The following status codes are included:
         * - 429: Too Many Requests
         * - 422: Unprocessable Entity
         * - 410: Gone
         * - 408: Request Timeout
         * - 444: No Response
         * - 449: Retry With
         *
         * @var array<int>
         */
        $tryAgain = [429, 422, 410, 408, 444, 449];
        if ($exception instanceof ClientExceptionInterface) {
            $response = $exception->getResponse();
            return isset($response) && (
                in_array($response->getStatusCode(), $tryAgain) ||
                $response->getStatusCode() >= 500
            );
        }
        return false;
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

    /**
     * Get the last response.
     */
    public function getLastResponse(): ?ResponseInterface
    {
        return $this->responseHistory->getLastResponse();
    }
}
