<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Integration;

use Gubee\SDK\Gubee;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\ProcessIdProcessor;
use Monolog\Processor\UidProcessor;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

use function dirname;
use function is_dir;
use function mkdir;

abstract class AbstractTestCase extends TestCase
{
    protected Gubee $gubee;
    protected FilesystemAdapter $cache;
    protected LoggerInterface $logger;

    protected function setUp(): void
    {
        $this->logger = new Logger(
            'gubee-sdk',
            [
                new StreamHandler(
                    (function () {
                        $path = dirname(__DIR__, 2) . '/var/log/gubee-sdk.log';
                        if (! is_dir(dirname($path))) {
                            mkdir(dirname($path), 0777, true);
                        }
                        return $path;
                    })()
                ),
            ],
            [
                new MemoryPeakUsageProcessor(),
                new MemoryUsageProcessor(),
                new UidProcessor(),
                new ProcessIdProcessor(),
                new HostnameProcessor(),
            ]
        );
        $this->logger->log(
            Logger::DEBUG,
            'Logger initialized'
        );
        $this->cache = new FilesystemAdapter(
            'cache',
            0,
            (function () {
                $path = dirname(__DIR__, 2) . '/var';
                if (! is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                return $path;
            })()
        );

        $this->gubee = new Gubee(
            null,
            $this->logger
        );
    }

    public function getGubee(): Gubee
    {
        return $this->gubee;
    }

    public function setGubee(Gubee $gubee): self
    {
        $this->gubee = $gubee;
        return $this;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCache(): FilesystemAdapter
    {
        return $this->cache;
    }

    /**
     * @param mixed $cache
     */
    public function setCache($cache): self
    {
        $this->cache = $cache;
        return $this;
    }
}
