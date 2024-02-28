<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Gubee;

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
     */
    public function setPlatform(string $platform): self;
}
