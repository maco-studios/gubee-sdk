<?php

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\KitAssociationInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for KitAssociationApiDTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/KitAssociationApiDTO
 *
 * @method self setQty(int qty) Set the qty property
 * @method int getQty() Get the qty property
 * @method self setSkuId(string skuId) Set the sku id property
 * @method string getSkuId() Get the sku id property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class KitAssociation extends AbstractModel implements KitAssociationInterface
{
    /**
     * @var int
     */
    protected int $qty;

    /**
     * @var string
     */
    protected ?string $skuId = null;

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
