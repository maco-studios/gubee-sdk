<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Library\ObjectManager;

interface ServiceProviderInterface
{
    /**
     * Create a new object instance of the given type.
     *
     * @param array<int|string, mixed> $arguments
     * @return mixed The created object instance.
     */
    public function create(string $type, array $arguments = []);
}
