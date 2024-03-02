<?php

namespace Gubee\SDK\Api\Sales\Order\Item;

use Gubee\SDK\Api\ModelInterface;

interface ItemOrderInterface extends ModelInterface
{
    /**
     * Set the percentage of total property
     *
     * @param float $percentageOfTotal
     * @return $this
     */
    public function setPercentageOfTotal(float $percentageOfTotal): self;
    /**
     * Get the percentage of total property
     *
     * @return float
     */
    public function getPercentageOfTotal(): float;
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
