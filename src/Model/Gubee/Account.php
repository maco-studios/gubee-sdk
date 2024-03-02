<?php

namespace Gubee\SDK\Model\Gubee;

use Gubee\SDK\Api\Gubee\AccountInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for AccountApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/AccountApiDTORes
 *
 * @method self setAccountId(string accountId) Set the account id property
 * @method string getAccountId() Get the account id property
 * @method self setPlatform(string platform) Set the platform property
 * @method string getPlatform() Get the platform property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Account extends AbstractModel implements AccountInterface
{
    /**
     * @var string
     */
    protected ?string $accountId = null;

    /**
     * @var string
     */
    protected ?string $platform = null;

    /**
     * Set the account id property
     *
     * @param string $accountId
     * @return $this
     */
    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * Get the account id property
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * Set the platform property
     *
     * @param string $platform
     * @return $this
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * Get the platform property
     *
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }
}
