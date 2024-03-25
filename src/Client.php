<?php

declare(strict_types=1);

namespace Gubee\SDK;

use DI\ContainerBuilder;
use Gubee\SDK\Api\Library\ObjectManager\ServiceProviderInterface;
use Gubee\SDK\Library\HttpClient\Builder;
use Gubee\SDK\Library\ObjectManager\ServiceProvider;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Http\Message\Authentication\Bearer;
use Psr\Log\LoggerInterface;

use function get_class;
use function get_object_vars;
use function pow;
use function sprintf;

class Client
{
    public const VERSION    = '1.0.0';
    public const USER_AGENT = 'gubee-sdk-php/' . self::VERSION;
    public const BASE_URI   = 'https://api.gubee.com.br/';
    protected ServiceProviderInterface $objectManager;
    protected Builder $builder;
    protected LoggerInterface $logger;

    public function __construct(
        ?ServiceProviderInterface $objectManager = null,
        ?Builder $builder = null,
        ?LoggerInterface $logger = null,
        int $retries = 3,
        int $retriesDelaySecs = 1
    ) {
        $this->objectManager = $objectManager ?: $this->getObjectManager();
        $this->builder       = $builder ?: $this->objectManager
            ->create(Builder::class);
        $this->logger        = $logger ?: $this->objectManager
            ->create(LoggerInterface::class);
        $this->builder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'User-Agent'   => self::USER_AGENT,
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            )
        )->addPlugin(
            new RetryPlugin([
                'retries'         => $retries,
                'exception_delay' => function (
                    int $retries
                ) use (
                    $retriesDelaySecs
                ) {
                    return pow(2, $retries) * ($retriesDelaySecs * 1000);
                },
            ])
        );

        $this->setUri(self::BASE_URI);
    }

    public function authenticate(string $token): self
    {
        $this->builder->removePlugin(HeaderDefaultsPlugin::class);
        $this->builder->addPlugin(
            new AuthenticationPlugin(
                new Bearer($token)
            )
        );
        return $this;
    }

    public function setUri(string $uri): self
    {
        $uri = $this->builder->getUriFactory()
            ->createUri($uri);
        $this->builder->removePlugin(BaseUriPlugin::class);
        $this->builder->addPlugin(
            new BaseUriPlugin(
                $uri
            )
        );
        return $this;
    }

    protected function getObjectManager(): ServiceProviderInterface
    {
        $containerBuilder = new ContainerBuilder(
            ServiceProvider::class
        );
        $containerBuilder->addDefinitions(
            include __DIR__ . '/config/di.php'
        );
        $containerBuilder->useAutowiring(true);
        /** @var ServiceProviderInterface $container */
        $container = $containerBuilder->build();

        return $container;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function __debugInfo()
    {
        $values                  = get_object_vars($this);
        $values['objectManager'] = sprintf(
            "** OMITTED class '%s' instance **",
            get_class($values['objectManager'])
        );

        return $values;
    }
}
