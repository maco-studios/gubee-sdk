<?php

namespace Gubee\SDK\Api\Sales\Order\Item;

use Gubee\SDK\Api\ModelInterface;

interface DiscountInterface extends ModelInterface
{
    /**
     * Set the discount property
     *
     * @param float $discount
     * @return $this
     */
    public function setDiscount(float $discount): self;
    /**
     * Get the discount property
     *
     * @return float
     */
    public function getDiscount(): float;
    /**
     * Set the percentage property
     *
     * @param bool $percentage
     * @return $this
     */
    public function setPercentage(bool $percentage): self;
    /**
     * Get the percentage property
     *
     * @return bool
     */
    public function getPercentage(): bool;
}
