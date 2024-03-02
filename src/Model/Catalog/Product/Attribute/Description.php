<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Api\Catalog\Product\Attribute\DescriptionInterface;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Api\Gubee\PlatformStoreInterface;

/**
 * Model for DescriptionApiDTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/DescriptionApiDTO
 *
 * @method self setDescription(string description) Set the description property
 * @method string getDescription() Get the description property
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setPlatformStore(PlatformStoreInterface platformStore) Set the
 * platform store property
 * @method PlatformStoreInterface getPlatformStore() Get the platform store
 * property
 * @method self setProductId(string productId) Set the product id property
 * @method string getProductId() Get the product id property
 * @method self setSellerId(string sellerId) Set the seller id property
 * @method string getSellerId() Get the seller id property
 * @method self setSkuId(string skuId) Set the sku id property
 * @method string getSkuId() Get the sku id property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Description extends AbstractModel implements DescriptionInterface
{
    /**
     * @var string
     */
    protected ?string $description = null;

    /**
     * @var string
     */
    protected ?string $id = null;

    /**
     * @var PlatformStoreInterface
     */
    protected ?PlatformStoreInterface $platformStore = null;

    /**
     * @var string
     */
    protected ?string $productId = null;

    /**
     * @var string
     */
    protected ?string $sellerId = null;

    /**
     * @var string
     */
    protected ?string $skuId = null;

    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

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
     * Set the platform store property
     *
     * @param PlatformStoreInterface $platformStore
     * @return $this
     */
    public function setPlatformStore(PlatformStoreInterface $platformStore): self
    {
        $this->platformStore = $platformStore;
        return $this;
    }

    /**
     * Get the platform store property
     *
     * @return PlatformStoreInterface
     */
    public function getPlatformStore(): PlatformStoreInterface
    {
        return $this->platformStore;
    }

    /**
     * Set the product id property
     *
     * @param string $productId
     * @return $this
     */
    public function setProductId(string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Get the product id property
     *
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
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
     * Set the sku id property
     *
     * @param string $skuId
     * @return $this
     */
    public function setSkuId(string $skuId): self
    {
        $this->skuId = $skuId;
        return $this;
    }

    /**
     * Get the sku id property
     *
     * @return string
     */
    public function getSkuId(): string
    {
        return $this->skuId;
    }
}
