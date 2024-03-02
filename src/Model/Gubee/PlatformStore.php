<?php

namespace Gubee\SDK\Model\Gubee;

use Gubee\SDK\Api\Gubee\PlatformStoreInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for PlatformStore
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/PlatformStore
 *
 * @method self setPlatform(string platform) Set the platform property
 * @method string getPlatform() Get the platform property
 * @method self setStore(string store) Set the store property
 * @method string getStore() Get the store property
 * @method array jsonSerialize() Serialize the model to an array
 */
class PlatformStore extends AbstractModel implements PlatformStoreInterface
{
    /**
     * @var string
     */
    protected ?string $platform = null;

    /**
     * @var string
     */
    protected ?string $store = null;

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

    /**
     * Set the store property
     *
     * @param string $store
     * @return $this
     */
    public function setStore(string $store): self
    {
        $this->store = $store;
        return $this;
    }

    /**
     * Get the store property
     *
     * @return string
     */
    public function getStore(): string
    {
        return $this->store;
    }
}
