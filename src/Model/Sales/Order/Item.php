<?php

namespace Gubee\SDK\Model\Sales\Order;

use Gubee\SDK\Api\Sales\Order\Item\DiscountInterface;
use Gubee\SDK\Api\Sales\Order\Item\ItemOrderInterface;
use Gubee\SDK\Api\Sales\Order\ItemInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for ItemApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/ItemApiDTORes
 *
 * @method self setDiscount(DiscountInterface discount) Set the discount property
 * @method DiscountInterface getDiscount() Get the discount property
 * @method self setExternalId(string externalId) Set the external id property
 * @method string getExternalId() Get the external id property
 * @method self setFulfillment(bool fulfillment) Set the fulfillment property
 * @method bool getFulfillment() Get the fulfillment property
 * @method self setOriginalPrice(float originalPrice) Set the original price
 * property
 * @method float getOriginalPrice() Get the original price property
 * @method self setQty(int qty) Set the qty property
 * @method int getQty() Get the qty property
 * @method self setSalePrice(float salePrice) Set the sale price property
 * @method float getSalePrice() Get the sale price property
 * @method self setSkuId(string skuId) Set the sku id property
 * @method string getSkuId() Get the sku id property
 * @method self setSubItems(array subItems) Set the sub items property
 * @method array getSubItems() Get the sub items property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Item extends AbstractModel implements ItemInterface
{
    /**
     * @var DiscountInterface
     */
    protected ?DiscountInterface $discount = null;

    /**
     * @var string
     */
    protected ?string $externalId = null;

    /**
     * @var bool
     */
    protected ?bool $fulfillment = null;

    /**
     * @var float
     */
    protected ?float $originalPrice = null;

    /**
     * @var int
     */
    protected ?int $qty = null;

    /**
     * @var float
     */
    protected ?float $salePrice = null;

    /**
     * @var string
     */
    protected ?string $skuId = null;

    /**
     * @var array<ItemOrderInterface>
     */
    protected array $subItems = null;

    /**
     * Set the discount property
     *
     * @param DiscountInterface $discount
     * @return $this
     */
    public function setDiscount(DiscountInterface $discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Get the discount property
     *
     * @return DiscountInterface
     */
    public function getDiscount(): DiscountInterface
    {
        return $this->discount;
    }

    /**
     * Set the external id property
     *
     * @param string $externalId
     * @return $this
     */
    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * Get the external id property
     *
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * Set the fulfillment property
     *
     * @param bool $fulfillment
     * @return $this
     */
    public function setFulfillment(bool $fulfillment): self
    {
        $this->fulfillment = $fulfillment;
        return $this;
    }

    /**
     * Get the fulfillment property
     *
     * @return bool
     */
    public function getFulfillment(): bool
    {
        return $this->fulfillment;
    }

    /**
     * Set the original price property
     *
     * @param float $originalPrice
     * @return $this
     */
    public function setOriginalPrice(float $originalPrice): self
    {
        $this->originalPrice = $originalPrice;
        return $this;
    }

    /**
     * Get the original price property
     *
     * @return float
     */
    public function getOriginalPrice(): float
    {
        return $this->originalPrice;
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
     * Set the sale price property
     *
     * @param float $salePrice
     * @return $this
     */
    public function setSalePrice(float $salePrice): self
    {
        $this->salePrice = $salePrice;
        return $this;
    }

    /**
     * Get the sale price property
     *
     * @return float
     */
    public function getSalePrice(): float
    {
        return $this->salePrice;
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
     * Set the sub items property
     *
     * @param array<ItemOrderInterface> $subItems
     * @return $this
     */
    public function setSubItems(array $subItems): self
    {
        foreach ($subItems as $item) {
            if (!$item instanceof ItemOrderInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        ItemOrderInterface::class
                    )
                );
            }
        }
        $this->subItems = $subItems;
        return $this;
    }

    /**
     * Get the sub items property
     *
     * @return array<ItemOrderInterface>
     */
    public function getSubItems(): array
    {
        return $this->subItems;
    }
}
