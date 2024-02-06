<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\UnitTimeInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\DimensionInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\ValueInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Media\ImageInterface;
use Gubee\SDK\Interfaces\Catalog\Product\PriceInterface;
use Gubee\SDK\Interfaces\Catalog\Product\StockInterface;
use Gubee\SDK\Interfaces\Catalog\Product\VariationInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;

use function get_class;
use function gettype;
use function implode;
use function in_array;
use function is_object;
use function is_string;
use function sprintf;

class Variation extends AbstractModel implements VariationInterface
{
    protected float $cost;
    protected string $description;
    protected DimensionInterface $dimension;
    protected string $ean;
    protected UnitTimeInterface $handlingTime;
    protected array $images;
    protected bool $main;
    protected string $name;
    protected array $prices;
    protected string $sku;
    protected string $skuId;
    protected string $status;
    protected array $stocks;
    protected array $variantSpecification;
    protected UnitTimeInterface $warrantyTime;

    /**
     * Set the cost of the variation.
     *
     * @param float $cost The cost of the variation.
     */
    public function setCost(float $cost): self
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Get the cost of the variation.
     *
     * @return float The cost of the variation.
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * Set the description of the variation.
     *
     * @param string $description The description of the variation.
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the description of the variation.
     *
     * @return string The description of the variation.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the dimension of the variation.
     *
     * @param DimensionInterface $dimension The dimension of the variation.
     */
    public function setDimension(DimensionInterface $dimension): self
    {
        $this->dimension = $dimension;
        return $this;
    }

    /**
     * Get the dimension of the variation.
     *
     * @return DimensionInterface The dimension of the variation.
     */
    public function getDimension(): DimensionInterface
    {
        return $this->dimension;
    }

    /**
     * Set the EAN (European Article Number) of the variation.
     *
     * @param string $ean The EAN of the variation.
     */
    public function setEan(string $ean): self
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * Get the EAN (European Article Number) of the variation.
     *
     * @return string The EAN of the variation.
     */
    public function getEan(): string
    {
        return $this->ean;
    }

    /**
     * Set the handling time of the variation.
     *
     * @param UnitTimeInterface $unitTime The handling time of the variation.
     */
    public function setHandlingTime(UnitTimeInterface $unitTime): self
    {
        $this->handlingTime = $unitTime;
        return $this;
    }

    /**
     * Get the handling time of the variation.
     *
     * @return UnitTimeInterface The handling time of the variation.
     */
    public function getHandlingTime(): UnitTimeInterface
    {
        return $this->handlingTime;
    }

    /**
     * Set the images of the variation.
     *
     * @param array<ImageInterface> $images The images of the variation.
     */
    public function setImages(array $images): self
    {
        foreach ($images as $image) {
            if (! is_string($image)) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The image must be a instance of '%s', '%s' given.",
                        ImageInterface::class,
                        is_object($image) ? get_class($image) : gettype($image)
                    )
                );
            }
        }

        $this->images = $images;
        return $this;
    }

    /**
     * Get the images of the variation.
     *
     * @return array<ImageInterface> The images of the variation.
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * Set whether the variation is the main variation of the product.
     *
     * @param bool $isMain Whether the variation is the main variation.
     */
    public function setIsMain(bool $isMain): self
    {
        $this->main = $isMain;
        return $this;
    }

    /**
     * Check whether the variation is the main variation of the product.
     *
     * @return bool Whether the variation is the main variation.
     */
    public function getIsMain(): bool
    {
        return $this->main;
    }

    /**
     * Set the name of the variation.
     *
     * @param string $name The name of the variation.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name of the variation.
     *
     * @return string The name of the variation.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the prices of the variation.
     *
     * @param array<PriceInterface> $prices The prices of the variation.
     */
    public function setPrices(array $prices): self
    {
        foreach ($prices as $price) {
            if (! $price instanceof PriceInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The price must be a instance of '%s', '%s' given.",
                        PriceInterface::class,
                        is_object($price) ? get_class($price) : gettype($price)
                    )
                );
            }
        }

        $this->prices = $prices;
        return $this;
    }

    /**
     * Get the prices of the variation.
     *
     * @return array<PriceInterface> The prices of the variation.
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * Set the SKU (Stock Keeping Unit) of the variation.
     *
     * @param string $sku The SKU of the variation.
     */
    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Get the SKU (Stock Keeping Unit) of the variation.
     *
     * @return string The SKU of the variation.
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * Set the SKU ID of the variation.
     *
     * @param string $skuId The SKU ID of the variation.
     */
    public function setSkuId(string $skuId): self
    {
        $this->skuId = $skuId;
        return $this;
    }

    /**
     * Get the SKU ID of the variation.
     *
     * @return string The SKU ID of the variation.
     */
    public function getSkuId(): string
    {
        return $this->skuId;
    }

    /**
     * Set the status of the variation.
     *
     * @param string $status The status of the variation.
     */
    public function setStatus(string $status): self
    {
        $statusList = [
            self::ACTIVE,
            self::INACTIVE,
        ];
        if (! in_array($status, $statusList)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The status must be one of '%s', '%s' given.",
                    implode("', '", $statusList),
                    $status
                )
            );
        }

        $this->status = $status;
        return $this;
    }

    /**
     * Get the status of the variation.
     *
     * @return string The status of the variation.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the stocks of the variation.
     *
     * @param array<StockInterface> $stocks The stocks of the variation.
     */
    public function setStocks(array $stocks): self
    {
        foreach ($stocks as $stock) {
            if (! $stock instanceof StockInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The stock must be a instance of '%s', '%s' given.",
                        StockInterface::class,
                        is_object($stock) ? get_class($stock) : gettype($stock)
                    )
                );
            }
        }

        $this->stocks = $stocks;
        return $this;
    }

    /**
     * Get the stocks of the variation.
     *
     * @return array<StockInterface> The stocks of the variation.
     */
    public function getStocks(): array
    {
        return $this->stocks;
    }

    /**
     * Set the variant specification for the product.
     *
     * @param array<ValueInterface> $variantSpecification The variant specification.
     */
    public function setVariantSpecification(array $variantSpecification): self
    {
        foreach ($variantSpecification as $value) {
            if (! $value instanceof ValueInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The value must be a instance of '%s', '%s' given.",
                        ValueInterface::class,
                        is_object($value) ? get_class($value) : gettype($value)
                    )
                );
            }
        }

        $this->variantSpecification = $variantSpecification;
        return $this;
    }

    /**
     * Get the variant specification for the product.
     *
     * @return array<ValueInterface> The variant specification.
     */
    public function getVariantSpecification(): array
    {
        return $this->variantSpecification;
    }

    /**
     * Set the warranty time of the variation.
     *
     * @param UnitTimeInterface $unitTime The warranty time of the variation.
     */
    public function setWarrantyTime(UnitTimeInterface $unitTime): self
    {
        $this->warrantyTime = $unitTime;
        return $this;
    }

    /**
     * Get the warranty time of the variation.
     *
     * @return UnitTimeInterface The warranty time of the variation.
     */
    public function getWarrantyTime(): UnitTimeInterface
    {
        return $this->warrantyTime;
    }
}
