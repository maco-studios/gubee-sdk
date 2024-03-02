<?php

namespace Gubee\SDK\Api\Gubee;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;

interface TokenInterface extends ModelInterface
{
    public const ADMIN = 'ADMIN';

    public const API = 'API';

    public const USER = 'USER';

    public const TOKENTYPE_LIST = [self::ADMIN, self::API, self::USER];

    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the login property
     *
     * @param string $login
     * @return $this
     */
    public function setLogin(string $login): self;
    /**
     * Get the login property
     *
     * @return string
     */
    public function getLogin(): string;
    /**
     * Set the revoked property
     *
     * @param bool $revoked
     * @return $this
     */
    public function setRevoked(bool $revoked): self;
    /**
     * Get the revoked property
     *
     * @return bool
     */
    public function getRevoked(): bool;
    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self;
    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string;
    /**
     * Set the token property
     *
     * @param string $token
     * @return $this
     */
    public function setToken(string $token): self;
    /**
     * Get the token property
     *
     * @return string
     */
    public function getToken(): string;
    /**
     * Set the token type property
     *
     * @param string $tokenType
     * @return $this
     */
    public function setTokenType(string $tokenType): self;
    /**
     * Get the token type property
     *
     * @return string
     */
    public function getTokenType(): string;
    /**
     * Set the validity property
     *
     * @param DateTimeInterface $validity
     * @return $this
     */
    public function setValidity(DateTimeInterface $validity): self;
    /**
     * Get the validity property
     *
     * @return DateTimeInterface
     */
    public function getValidity(): DateTimeInterface;
}
