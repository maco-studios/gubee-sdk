<?php

namespace Gubee\SDK\Api\Gubee;

use Gubee\SDK\Api\ModelInterface;

interface PlatformStoreInterface extends ModelInterface
{
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
    /**
     * Set the store property
     *
     * @param string $store
     * @return $this
     */
    public function setStore(string $store): self;
    /**
     * Get the store property
     *
     * @return string
     */
    public function getStore(): string;
}
