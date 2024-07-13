<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Unit\Model;

use DateTimeImmutable;
use Gubee\SDK\Enum\Token\TokenTypeEnum;
use Gubee\SDK\Model\Token;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    public function testGetters(): void
    {
        $id          = '123';
        $login       = 'john@example.com';
        $revoked     = false;
        $sellerId    = '456';
        $tokenString = 'abc123';
        $tokenType   = TokenTypeEnum::ADMIN();
        $validity    = new DateTimeImmutable('2022-01-01');

        $token = new Token($id, $login, $revoked, $sellerId, $tokenString, $tokenType, $validity);

        $this->assertEquals($id, $token->getId());
        $this->assertEquals($login, $token->getLogin());
        $this->assertEquals($revoked, $token->getRevoked());
        $this->assertEquals($sellerId, $token->getSellerId());
        $this->assertEquals($tokenString, $token->getToken());
        $this->assertEquals($tokenType, $token->getTokenType());
        $this->assertEquals($validity, $token->getValidity());
    }

    public function testSetters(): void
    {
        $token = new Token('', '', false, '', '', TokenTypeEnum::API(), new DateTimeImmutable());

        $id         = '123';
        $login      = 'john@example.com';
        $revoked    = false;
        $sellerId   = '456';
        $tokenValue = 'abc123';
        $tokenType  = TokenTypeEnum::API();
        $validity   = new DateTimeImmutable('2022-01-01');

        $token->setId($id);
        $token->setLogin($login);
        $token->setRevoked($revoked);
        $token->setSellerId($sellerId);
        $token->setToken($tokenValue);
        $token->setTokenType($tokenType);
        $token->setValidity($validity);

        $this->assertEquals($id, $token->getId());
        $this->assertEquals($login, $token->getLogin());
        $this->assertEquals($revoked, $token->getRevoked());
        $this->assertEquals($sellerId, $token->getSellerId());
        $this->assertEquals($tokenValue, $token->getToken());
        $this->assertEquals($tokenType, $token->getTokenType());
        $this->assertEquals($validity, $token->getValidity());
    }

    public function testFromJson(): void
    {
        $data = [
            'id'        => '123',
            'login'     => 'john@example.com',
            'revoked'   => false,
            'sellerId'  => '456',
            'token'     => 'abc123',
            'tokenType' => 'ADMIN',
            'validity'  => '2022-01-01',
        ];

        $token = Token::fromJson($data);

        $this->assertInstanceOf(Token::class, $token);
        $this->assertEquals($data['id'], $token->getId());
        $this->assertEquals($data['login'], $token->getLogin());
        $this->assertEquals($data['revoked'], $token->getRevoked());
        $this->assertEquals($data['sellerId'], $token->getSellerId());
        $this->assertEquals($data['token'], $token->getToken());
        $this->assertEquals(TokenTypeEnum::fromValue($data['tokenType']), $token->getTokenType());
        $this->assertEquals(new DateTimeImmutable($data['validity']), $token->getValidity());
    }
}
