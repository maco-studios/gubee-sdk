<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use Gubee\SDK\Enum\Token\TokenTypeEnum;

class Token extends AbstractModel
{
    /** @var string */
    protected string $id;
    /** @var string */
    protected string $login;
    /** @var bool */
    protected bool $revoked;
    /** @var string */
    protected string $sellerId;
    /** @var string */
    protected string $token;
    /** @var TokenTypeEnum */
    protected TokenTypeEnum $tokenType;
    /** @var \DateTimeInterface */
    protected \DateTimeInterface $validity;

    /**
     * @param string $id
     * @param string $login
     * @param bool $revoked
     * @param string $sellerId
     * @param string $token
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
        \DateTimeInterface $validity
    ) {
        $this->id = $id;
        $this->login = $login;
        $this->revoked = $revoked;
        $this->sellerId = $sellerId;
        $this->token = $token;
        $this->tokenType = $tokenType;
        $this->validity = $validity;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return bool
     */
    public function getRevoked(): bool
    {
        return $this->revoked;
    }

    /**
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    /**
     * @return string
     */
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

    /**
     * @return \DateTimeInterface
     */
    public function getValidity(): \DateTimeInterface
    {
        return $this->validity;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $login
     * @return self
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @param bool $revoked
     * @return self
     */
    public function setRevoked(bool $revoked): self
    {
        $this->revoked = $revoked;
        return $this;
    }

    /**
     * @param string $sellerId
     * @return self
     */
    public function setSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @param string $token
     * @return self
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param string $tokenType
     * @return self
     */
    public function setTokenType(TokenTypeEnum $tokenType): self
    {
        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * @param string $validity
     * @return self
     */
    public function setValidity(\DateTimeInterface $validity): self
    {
        $this->validity = $validity;
        return $this;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromJson(array $data): self
    {
        $data['validity'] = new \DateTimeImmutable($data['validity']);

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
