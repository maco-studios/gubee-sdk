<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Gubee\PlatformStoreInterface;

interface DescriptionInterface extends ModelInterface
{
    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self;
    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string;
    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the platform store property
     *
     * @param PlatformStoreInterface $platformStore
     * @return $this
     */
    public function setPlatformStore(PlatformStoreInterface $platformStore): self;
    /**
     * Get the platform store property
     *
     * @return PlatformStoreInterface
     */
    public function getPlatformStore(): PlatformStoreInterface;
    /**
     * Set the product id property
     *
     * @param string $productId
     * @return $this
     */
    public function setProductId(string $productId): self;
    /**
     * Get the product id property
     *
     * @return string
     */
    public function getProductId(): string;
    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self;
    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string;
    /**
     * Set the sku id property
     *
     * @param string $skuId
     * @return $this
     */
    public function setSkuId(string $skuId): self;
    /**
     * Get the sku id property
     *
     * @return string
     */
    public function getSkuId(): string;
}
