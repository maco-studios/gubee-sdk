<?php

declare(strict_types=1);

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

use function DI\autowire;

return [
    LoggerInterface::class => autowire(NullLogger::class),
];
