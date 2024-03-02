<?php

namespace Gubee\SDK\Model\Gubee;

use DateTimeInterface;
use Gubee\SDK\Api\Gubee\TokenInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for TokenDTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/TokenDTO
 *
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setLogin(string login) Set the login property
 * @method string getLogin() Get the login property
 * @method self setRevoked(bool revoked) Set the revoked property
 * @method bool getRevoked() Get the revoked property
 * @method self setSellerId(string sellerId) Set the seller id property
 * @method string getSellerId() Get the seller id property
 * @method self setToken(string token) Set the token property
 * @method string getToken() Get the token property
 * @method self setTokenType(string tokenType) Set the token type property
 * @method string getTokenType() Get the token type property
 * @method self setValidity(DateTimeInterface validity) Set the validity property
 * @method DateTimeInterface getValidity() Get the validity property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Token extends AbstractModel implements TokenInterface
{
    /**
     * @var string
     */
    protected ?string $id = null;

    /**
     * @var string
     */
    protected ?string $login = null;

    /**
     * @var bool
     */
    protected ?bool $revoked = null;

    /**
     * @var string
     */
    protected ?string $sellerId = null;

    /**
     * @var string
     */
    protected ?string $token = null;

    /**
     * @var string
     */
    protected ?string $tokenType = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $validity = null;

    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the login property
     *
     * @param string $login
     * @return $this
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }

    /**
     * Get the login property
     *
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Set the revoked property
     *
     * @param bool $revoked
     * @return $this
     */
    public function setRevoked(bool $revoked): self
    {
        $this->revoked = $revoked;
        return $this;
    }

    /**
     * Get the revoked property
     *
     * @return bool
     */
    public function getRevoked(): bool
    {
        return $this->revoked;
    }

    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    /**
     * Set the token property
     *
     * @param string $token
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get the token property
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the token type property
     *
     * @param string $tokenType
     * @return $this
     */
    public function setTokenType(string $tokenType): self
    {
        if (!in_array($tokenType, self::TOKENTYPE_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::TOKENTYPE_LIST)
                )
            );
        }

        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * Get the token type property
     *
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * Set the validity property
     *
     * @param DateTimeInterface $validity
     * @return $this
     */
    public function setValidity(DateTimeInterface $validity): self
    {
        $this->validity = $validity;
        return $this;
    }

    /**
     * Get the validity property
     *
     * @return DateTimeInterface
     */
    public function getValidity(): DateTimeInterface
    {
        return $this->validity;
    }
}
