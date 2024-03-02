<?php

namespace Gubee\SDK\Model\Sales\Order\Item;

use Gubee\SDK\Api\Sales\Order\Item\ItemOrderInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for ItemOrderDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/ItemOrderDTORes
 *
 * @method self setPercentageOfTotal(float percentageOfTotal) Set the percentage
 * of total property
 * @method float getPercentageOfTotal() Get the percentage of total property
 * @method self setQty(int qty) Set the qty property
 * @method int getQty() Get the qty property
 * @method self setSkuId(string skuId) Set the sku id property
 * @method string getSkuId() Get the sku id property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class ItemOrder extends AbstractModel implements ItemOrderInterface
{
    /**
     * @var float
     */
    protected ?float $percentageOfTotal = null;

    /**
     * @var int
     */
    protected int $qty;

    /**
     * @var string
     */
    protected string $skuId;

    /**
     * Set the percentage of total property
     *
     * @param float $percentageOfTotal
     * @return $this
     */
    public function setPercentageOfTotal(float $percentageOfTotal): self
    {
        $this->percentageOfTotal = $percentageOfTotal;
        return $this;
    }

    /**
     * Get the percentage of total property
     *
     * @return float
     */
    public function getPercentageOfTotal(): float
    {
        return $this->percentageOfTotal;
    }

    /**
     * Set the qty property
     *
     * @param int $qty
     * @return $this
     */
    public function setQty(int $qty): self
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * Get the qty property
     *
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
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

    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool
    {
        $values = get_object_vars($this);
        $missingFields = [];
        if (!isset($values['qty'])) {
            $missingFields[] = 'qty';
        }

        if (!isset($values['skuId'])) {
            $missingFields[] = 'skuId';
        }

        if ($missingFields) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be set",
                    implode("', '", $missingFields)
                )
            );
        }
        return true;
    }
}
