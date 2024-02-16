<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Gubee;

use DateTimeInterface;
use Gubee\SDK\Interfaces\Gubee\TokenInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

class Token extends AbstractModel implements TokenInterface
{
    protected string $id;
    protected string $login;
    protected bool $revoked;
    protected string $sellerId;
    protected string $token;
    protected string $tokenType;
    protected DateTimeInterface $validity;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getRevoked(): bool
    {
        return $this->revoked;
    }

    public function setRevoked(bool $revoked): self
    {
        $this->revoked = $revoked;
        return $this;
    }

    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    public function setSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function setTokenType(string $tokenType): self
    {
        $tokenTypes = [self::ADMIN, self::API, self::USER];

        if (! in_array($tokenType, $tokenTypes)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Invalid token type '%s'. Valid types are: '%s'",
                    $tokenType,
                    implode(
                        "', '",
                        $tokenTypes
                    )
                )
            );
        }

        $this->tokenType = $tokenType;
        return $this;
    }

    public function getValidity(): DateTimeInterface
    {
        return $this->validity;
    }

    public function setValidity(DateTimeInterface $validity): self
    {
        $this->validity = $validity;
        return $this;
    }
}
