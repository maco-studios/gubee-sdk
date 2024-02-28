<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Gubee;

use Gubee\SDK\Api\Gubee\AccountInterface;
use Gubee\SDK\Model\AbstractModel;

class Account extends AbstractModel implements AccountInterface
{
    protected string $accountId;
    protected string $platform;

    /**
     * Get the account ID.
     *
     * @return string The account ID.
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * Set the account ID.
     *
     * @param string $accountId The account ID.
     */
    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * Get the platform.
     *
     * @return string The platform.
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * Set the platform.
     *
     * @param string $platform The platform.
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;
        return $this;
    }
}
