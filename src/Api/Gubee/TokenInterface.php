<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Gubee;

use DateTimeInterface;

interface TokenInterface
{
    /**
     * @var string
     */
    public const ADMIN = 'ADMIN';

    /**
     * @var string
     */
    public const API = 'API';

    /**
     * @var string
     */
    public const USER = 'USER';
    public function getId(): string;

    public function setId(string $id): self;

    public function getLogin(): string;

    public function setLogin(string $login): self;

    public function getRevoked(): bool;

    public function setRevoked(bool $revoked): self;

    public function getSellerId(): string;

    public function setSellerId(string $sellerId): self;

    public function getToken(): string;

    public function setToken(string $token): self;

    public function getTokenType(): string;

    public function setTokenType(string $tokenType): self;

    public function getValidity(): DateTimeInterface;

    public function setValidity(DateTimeInterface $validity): self;
}
