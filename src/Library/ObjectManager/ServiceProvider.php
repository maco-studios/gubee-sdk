<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\ObjectManager;

use DI\Container;
use Gubee\SDK\Api\Library\ObjectManager\ServiceProviderInterface;

class ServiceProvider extends Container implements ServiceProviderInterface
{
    /**
     * Create a new object instance of the given type.
     *
     * @param array<int|string, mixed> $arguments
     * @return mixed The created object instance.
     */
    public function create(string $type, array $arguments = [])
    {
        return $this->make($type, $arguments);
    }
}
