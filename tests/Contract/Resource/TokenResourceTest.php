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
        $payload = [
            "id" => "string",
            "login" => "string",
            "revoked" => true,
            "sellerId" => "string",
            "token" => "string",
            "tokenType" => "ADMIN",
            "validity" => "2024-03-12T15:43:38+00:00",
        ];

        $request = $this->createRequest(
            '/api/integration/tokens/revalidate/apitoken',
            'POST',
            false
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Revalidate token',
            $request,
            $response
        );

        $token = $this->client->token()->revalidate('apitoken');

        $this->assertEquals(
            $payload['id'],
            $token->getId(),
            'Token id does not match'
        );
        $this->assertEquals(
            $payload['login'],
            $token->getLogin(),
            'Token login does not match'
        );
        $this->assertEquals(
            $payload['revoked'],
            $token->getRevoked(),
            'Token revoked does not match'
        );
        $this->assertEquals(
            $payload['sellerId'],
            $token->getSellerId(),
            'Token sellerId does not match'
        );

        $this->assertEquals(
            $payload['token'],
            $token->getToken(),
            'Token token does not match'
        );

        $this->assertEquals(
            $payload['tokenType'],
            (string) $token->getTokenType()->getValue(),
            'Token tokenType does not match'
        );
        $this->assertEquals(
            $payload['validity'],
            $token->getValidity()->format(\DateTimeInterface::ATOM),
            'Token validity does not match'
        );

        $interaction->verify();
    }

}
