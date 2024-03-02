<?php

namespace Gubee\SDK\Api\Gubee;

use Gubee\SDK\Api\ModelInterface;

interface AccountInterface extends ModelInterface
{
    /**
     * Set the account id property
     *
     * @param string $accountId
     * @return $this
     */
    public function setAccountId(string $accountId): self;
    /**
     * Get the account id property
     *
     * @return string
     */
    public function getAccountId(): string;
    /**
     * Set the platform property
     *
     * @param string $platform
     * @return $this
     */
    public function setPlatform(string $platform): self;
    /**
     * Get the platform property
     *
     * @return string
     */
    public function getPlatform(): string;
}
