<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Unit\Library\ObjectManager;

use DI\ContainerBuilder;
use DI\NotFoundException;
use Gubee\SDK\Api\ServiceProviderInterface;
use Gubee\SDK\Client;
use Gubee\SDK\Library\ObjectManager\ServiceProvider;
use NotRegistered;
use PHPUnit\Framework\TestCase;

/**
 * @see \Gubee\SDK\Library\ObjectManager\ServiceProvider
 */
class ServiceProviderTest extends TestCase
{
    protected ServiceProviderInterface $container;

    public function setUp(): void
    {
        $containerBuilder = new ContainerBuilder(
            ServiceProvider::class
        );
        $containerBuilder->addDefinitions([
            Client::class => function () {
                return new Client();
            },
        ]);
        $this->container = $containerBuilder->build();
    }

    public function testCreate()
    {
        $client = $this->container->create(Client::class);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testCreateNotRegistered()
    {
        $this->expectException(
            NotFoundException::class
        );
        $this->container->create(NotRegistered::class);
    }
}
