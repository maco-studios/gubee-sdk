<?php

namespace Gubee\SDK\Model\Sales\Order\Item;

use Gubee\SDK\Api\Sales\Order\Item\DiscountInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for DiscountApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/DiscountApiDTORes
 *
 * @method self setDiscount(float discount) Set the discount property
 * @method float getDiscount() Get the discount property
 * @method self setPercentage(bool percentage) Set the percentage property
 * @method bool getPercentage() Get the percentage property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Discount extends AbstractModel implements DiscountInterface
{
    /**
     * @var float
     */
    protected ?float $discount = null;

    /**
     * @var bool
     */
    protected ?bool $percentage = null;

    /**
     * Set the discount property
     *
     * @param float $discount
     * @return $this
     */
    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Get the discount property
     *
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * Set the percentage property
     *
     * @param bool $percentage
     * @return $this
     */
    public function setPercentage(bool $percentage): self
    {
        $this->percentage = $percentage;
        return $this;
    }

    /**
     * Get the percentage property
     *
     * @return bool
     */
    public function getPercentage(): bool
    {
        return $this->percentage;
    }
}
