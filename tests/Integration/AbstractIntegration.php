<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration;

use Gubee\SDK\Client;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AbstractIntegration extends TestCase
{

    protected Client $client;

    protected LoggerInterface $logger;
    protected \Psr\Cache\CacheItemPoolInterface $cache;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->logger = new \Monolog\Logger(
            'integration-tests',
            [
                new \Monolog\Handler\StreamHandler('php://stdout')
            ],
            [
                new \Monolog\Processor\UidProcessor(),
                new \Monolog\Processor\MemoryUsageProcessor(),
                new \Monolog\Processor\MemoryPeakUsageProcessor(),
                new \Monolog\Processor\ProcessIdProcessor(),
            ]
        );
        if (
            !is_dir(
                __DIR__ . '/../../var/cache'
            )
        ) {
            mkdir(
                __DIR__ . '/../../var/cache',
                0777,
                true
            );
        }

        $this->cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter(
            'gubee-sdk-tests',
            0,
            __DIR__ . '/../../var/cache'
        );
    }

    public function revalidate()
    {
        $tokenCache = $this->cache->getItem('token');
        if ($tokenCache->isHit()) {
            $token = $tokenCache->get();
            $this->assertInstanceOf(
                \Gubee\SDK\Model\Token::class,
                $token
            );
            $this->getClient()->authenticate($token->getToken());
            return $this->assertTrue(true);
        }
        try {
            $token = $this->client->token()->revalidate(
                getenv('API_TOKEN')
            );
            $tokenCache->set($token);
            $this->cache->save($tokenCache);
            return $this->assertInstanceOf(
                \Gubee\SDK\Model\Token::class,
                $token,
                sprintf(
                    "Token is not an instance of %s",
                    \Gubee\SDK\Model\Token::class
                )
            );
        } catch (\Exception $e) {
            $this->fail(
                sprintf(
                    "Failed to revalidate token: %s",
                    $e->getMessage()
                )
            );
        }
    }

    protected function setUp(): void
    {
        $this->client = new Client(
            $this->logger
        );
        $this->revalidate();
        if (!getenv('API_TOKEN')) {
            throw new \Exception('API_TOKEN not found');
        }
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client 
     * @return self
     */
    public function setClient(Client $client): self
    {
        $this->client = $client;
        return $this;
    }
}
