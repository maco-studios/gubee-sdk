<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource;

use Gubee\SDK\Client;
use Gubee\SDK\Library\HttpClient\Exception\BadRequestException;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;
use Gubee\SDK\Model\Token;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Model\ConsumerRequest;
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

}
