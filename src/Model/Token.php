<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use DateTimeImmutable;
use DateTimeInterface;
use Gubee\SDK\Enum\Token\TokenTypeEnum;

class Token extends AbstractModel
{
    protected string $id;
    protected string $login;
    protected bool $revoked;
    protected string $sellerId;
    protected string $token;
    protected TokenTypeEnum $tokenType;
    protected DateTimeInterface $validity;

    /**
     * @param string $tokenType
     * @param string $validity
     */
    public function __construct(
        string $id,
        string $login,
        bool $revoked,
        string $sellerId,
        string $token,
        TokenTypeEnum $tokenType,
        DateTimeInterface $validity
    ) {
        $this->id        = $id;
        $this->login     = $login;
        $this->revoked   = $revoked;
        $this->sellerId  = $sellerId;
        $this->token     = $token;
        $this->tokenType = $tokenType;
        $this->validity  = $validity;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getRevoked(): bool
    {
        return $this->revoked;
    }

    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getTokenType(): TokenTypeEnum
    {
        return $this->tokenType;
    }

    public function getValidity(): DateTimeInterface
    {
        return $this->validity;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function setRevoked(bool $revoked): self
    {
        $this->revoked = $revoked;
        return $this;
    }

    public function setSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param string $tokenType
     */
    public function setTokenType(TokenTypeEnum $tokenType): self
    {
        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * @param string $validity
     */
    public function setValidity(DateTimeInterface $validity): self
    {
        $this->validity = $validity;
        return $this;
    }

    /**
     * @param array $data
     */
    public static function fromJson(array $data): self
    {
        $data['validity'] = new DateTimeImmutable($data['validity']);

        return new self(
            $data['id'],
            $data['login'],
            $data['revoked'],
            $data['sellerId'],
            $data['token'],
            TokenTypeEnum::fromValue($data['tokenType']),
            $data['validity']
        );
    }
}
