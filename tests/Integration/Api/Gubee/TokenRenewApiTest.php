<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Integration\Api\Gubee;

use DateTimeInterface;
use Gubee\SDK\Library\HttpClient\Exception\ErrorException;
use Gubee\SDK\Test\Integration\AbstractTestCase;

use function get_class;
use function getenv;
use function gettype;
use function is_object;
use function sprintf;

class TokenRenewApiTest extends AbstractTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        if (! getenv('GUBEE_API_TOKEN')) {
            $this->fail("'GUBEE_API_TOKEN' environment variable not set");
        }
    }

    public function testRevalidateToken()
    {
        /**
         * Token can only be revalidated in 10m intervals
         */
        if (! $token = $this->getCache()->getItem('token')->get()) {
            $token     = $this->getGubee()->token()->revalidate(
                $_ENV['GUBEE_API_TOKEN']
            );
            $cacheItem = $this->getCache()->getItem('token');
            $cacheItem->expiresAfter(60 * 10);
            $cacheItem->set($token);
            $this->getCache()->save($cacheItem);
        }

        $this->assertInstanceOf(
            DateTimeInterface::class,
            $token->getValidity(),
            sprintf(
                "Token validity is not an instance of %s but %s was found",
                DateTimeInterface::class,
                is_object($token->getValidity())
                ? get_class($token->getValidity())
                : gettype($token->getValidity())
            )
        );
        $this->assertNotEmpty(
            $token->getToken(),
            'Token is empty'
        );
        $this->assertIsString(
            $token->getToken(),
            'Token is not a string'
        );
    }

    public function testRevalidateTokenNotAuthenticated()
    {
        /** not error specific for authentication on gubee api */
        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('Internal Server Error');
        $this->getGubee()->token()->revalidate('invalid-token');
    }
}
