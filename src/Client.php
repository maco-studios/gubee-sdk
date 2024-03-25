<?php

declare(strict_types=1);

namespace Gubee\SDK;

use DI\ContainerBuilder;
use Gubee\SDK\Api\Library\ObjectManager\ServiceProviderInterface;
use Gubee\SDK\Library\HttpClient\Builder;
use Gubee\SDK\Library\ObjectManager\ServiceProvider;

class Client
{
    protected ServiceProviderInterface $objectManager;
    protected Builder $builder;

    public function __construct(
        ?ServiceProviderInterface $objectManager = null,
        ?Builder $builder = null
    ) {
        $this->objectManager = $objectManager ?: $this->getObjectManager();
        $this->builder       = $builder ?: $this->objectManager
            ->create(Builder::class);
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
}
