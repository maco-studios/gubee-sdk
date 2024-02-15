<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Gubee;

use Gubee\SDK\Interfaces\Gubee\AccountInterface;
use Gubee\SDK\Model\AbstractModel;

class Account extends AbstractModel implements AccountInterface
{
    protected string $accountId;
    protected string $platform;

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     * @return self
     */
    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return self
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;
        return $this;
    }
}
