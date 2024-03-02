<?php

namespace Gubee\SDK\Api\Catalog\Product;

use Gubee\SDK\Api\ModelInterface;

interface KitAssociationInterface extends ModelInterface
{
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
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
