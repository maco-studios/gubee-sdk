<?php

namespace Gubee\SDK\Api\Sales\Order;

use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Sales\Order\Item\DiscountInterface;
use Gubee\SDK\Api\Sales\Order\Item\ItemOrderInterface;

interface ItemInterface extends ModelInterface
{
    /**
     * Set the discount property
     *
     * @param DiscountInterface $discount
     * @return $this
     */
    public function setDiscount(DiscountInterface $discount): self;
    /**
     * Get the discount property
     *
     * @return DiscountInterface
     */
    public function getDiscount(): DiscountInterface;
    /**
     * Set the external id property
     *
     * @param string $externalId
     * @return $this
     */
    public function setExternalId(string $externalId): self;
    /**
     * Get the external id property
     *
     * @return string
     */
    public function getExternalId(): string;
    /**
     * Set the fulfillment property
     *
     * @param bool $fulfillment
     * @return $this
     */
    public function setFulfillment(bool $fulfillment): self;
    /**
     * Get the fulfillment property
     *
     * @return bool
     */
    public function getFulfillment(): bool;
    /**
     * Set the original price property
     *
     * @param float $originalPrice
     * @return $this
     */
    public function setOriginalPrice(float $originalPrice): self;
    /**
     * Get the original price property
     *
     * @return float
     */
    public function getOriginalPrice(): float;
    /**
     * Set the qty property
     *
     * @param int $qty
     * @return $this
     */
    public function setQty(int $qty): self;
    /**
     * Get the qty property
     *
     * @return int
     */
    public function getQty(): int;
    /**
     * Set the sale price property
     *
     * @param float $salePrice
     * @return $this
     */
    public function setSalePrice(float $salePrice): self;
    /**
     * Get the sale price property
     *
     * @return float
     */
    public function getSalePrice(): float;
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
    /**
     * Set the sub items property
     *
     * @param array<ItemOrderInterface> $subItems
     * @return $this
     */
    public function setSubItems(array $subItems): self;
    /**
     * Get the sub items property
     *
     * @return array<ItemOrderInterface>
     */
    public function getSubItems(): array;
}
