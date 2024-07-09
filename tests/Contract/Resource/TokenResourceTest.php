<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource;

use Gubee\SDK\Library\HttpClient\Exception\BadRequestException;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;
use Gubee\SDK\Model\Token;
use PHPUnit\Framework\TestCase;
use Gubee\SDK\Client;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PhpPact\Standalone\MockService\MockServerEnvConfig;

class TokenResourceTest extends AbstractResource
{

    public function testRevalidateToken(): void
    {
        $request = $this->createRequest(
            '/api/integration/tokens/revalidate/apitoken',
            'POST'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            [
                "id" => "string",
                "login" => "string",
                "revoked" => true,
                "sellerId" => "string",
                "token" => "string",
                "tokenType" => "ADMIN",
                "validity" => "2024-03-12T15:43:38.036Z",
            ]
        );

        $request = new ConsumerRequest();
        $tokenString = 'a6as1d61as65d1a65sd165a1s6d51a65sd1a';
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/tokens/revalidate/apitoken');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('A valid token')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->token()->revalidate($tokenString);
        $this->assertInstanceOf(Token::class, $result);
        $builder->verify();
    }

    public function testTokenNotExpired()
    {
        $request = $this->createRequest(
            '/api/integration/tokens/revalidate/apitoken',
            'POST'
        );
        $response = $this->createResponse(
            400,
            ['Content-Type' => 'application/json'],
            [
                "error" => "Token not expired",
                "message" => "Token not expired",
                "status" => 400
            ]
        );

        $request = new ConsumerRequest();
        $tokenString = 'a6as1d61as65d1a65sd165a1s6d51a65sd1a';
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/tokens/revalidate/apitoken');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('A valid token')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $this->expectException(BadRequestException::class);
        $this->expectExceptionMessage('Token not expired');
        $service->token()->revalidate($tokenString);
        $builder->verify();
    }

    public function testUnauthorized()
    {
        $request = $this->createRequest(
            '/api/integration/tokens/revalidate/apitoken',
            'POST'
        );
        $response = $this->createResponse(
            401,
            ['Content-Type' => 'application/json'],
            [
                "error" => "Unauthorized",
                "message" => "Unauthorized",
                "status" => 401
            ]
        );

        $request = new ConsumerRequest();
        $tokenString = 'a6as1d61as65d1a65sd165a1s6d51a65sd1a';
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/tokens/revalidate/apitoken');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('A valid token')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $this->expectException(UnauthorizedException::class);
        $this->expectExceptionMessage('Unauthorized');
        $service->token()->revalidate($tokenString);
        $builder->verify();
    }

    public function testTokenExpired()
    {
        $request = $this->createRequest(
            '/api/integration/tokens/revalidate/apitoken',
            'POST'
        );
        $response = $this->createResponse(
            403,
            ['Content-Type' => 'application/json'],
            [
                "error" => "Token expired",
                "message" => "Token expired",
                "status" => 400
            ]
        );

        $request = new ConsumerRequest();
        $tokenString = 'a6as1d61as65d1a65sd165a1s6d51a65sd1a';
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/tokens/revalidate/apitoken');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('A valid token')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $this->expectException(ForbiddenException::class);
        $this->expectExceptionMessage('Token expired');
        $service->token()->revalidate($tokenString);
        $builder->verify();
    }

    public function testTokenNotFound()
    {
        $request = $this->createRequest(
            '/api/integration/tokens/revalidate/apitoken',
            'POST'
        );
        $response = $this->createResponse(
            404,
            ['Content-Type' => 'application/json'],
            [
                "error" => "Token not found",
                "message" => "Token not found",
                "status" => 404
            ]
        );

        $request = new ConsumerRequest();
        $tokenString = 'a6as1d61as65d1a65sd165a1s6d51a65sd1a';
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/tokens/revalidate/apitoken');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('A valid token')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Token not found');
        $service->token()->revalidate($tokenString);
        $builder->verify();
    }

}
