<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration;

use Exception;
use Gubee\SDK\Client;
use Gubee\SDK\Model\Token;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

use function getenv;
use function is_dir;
use function mkdir;
use function sprintf;

class AbstractIntegration extends TestCase
{
    protected Client $client;

    protected LoggerInterface $logger;
    protected CacheItemPoolInterface $cache;

    /**
     * @param array<mixed, mixed> $data
     * @param string $dataName
     */
    public function __construct(
        ?string $name = null,
        array $data = [],
        $dataName = ''
    ) {
        parent::__construct($name, $data, $dataName);
        $this->logger = new Logger(
            'integration-tests',
            [
                new StreamHandler('php://stdout'),
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

        $this->cache = new FilesystemAdapter(
            'gubee-sdk-tests',
            0,
            __DIR__ . '/../../var/cache'
        );
    }

    /**
     * @return void
     */
    public function revalidate()
    {
        $tokenCache = $this->cache->getItem('token');
        if ($tokenCache->isHit()) {
            $token = $tokenCache->get();
            $this->assertInstanceOf(
                Token::class,
                $token
            );
            $this->getClient()->authenticate($token->getToken());
            $this->assertTrue(true);
            return;
        }
        try {
            $token = $this->client->token()->revalidate(
                getenv('API_TOKEN') // @phpstan-ignore argument.type
            );
            $tokenCache->set($token);
            $this->cache->save($tokenCache);
            $this->assertInstanceOf(
                Token::class,
                $token,
                sprintf(
                    "Token is not an instance of %s",
                    Token::class
                )
            );
            $this->getClient()->authenticate($token->getToken());
        } catch (Exception $e) {
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
            throw new Exception('API_TOKEN not found');
        }
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;
        return $this;
    }
}
