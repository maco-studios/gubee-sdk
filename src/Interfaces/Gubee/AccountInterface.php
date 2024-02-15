<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Gubee;

interface AccountInterface
{
    /**
     * Get the account ID.
     *
     * @return string The account ID.
     */
    public function getAccountId(): string;

    /**
     * Set the account ID.
     *
     * @param string $accountId The account ID.
     * @return self
     */
    public function setAccountId(string $accountId): self;

    /**
     * Get the platform.
     *
     * @return string The platform.
     */
    public function getPlatform(): string;

    /**
     * Set the platform.
     *
     * @param string $platform The platform.
     * @return self
     */
    public function setPlatform(string $platform): self;

}
