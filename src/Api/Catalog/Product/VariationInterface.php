<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\UnitTimeInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\DimensionInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\ValueInterface;
use Gubee\SDK\Api\Catalog\Product\Media\ImageInterface;
use Gubee\SDK\Api\Catalog\Product\StockInterface;

interface VariationInterface
{
    public const ACTIVE   = "ACTIVE";
    public const INACTIVE = "INACTIVE";

    /**
     * Set the cost of the variation.
     *
     * @param float $cost The cost of the variation.
     */
    public function setCost(float $cost): self;

    /**
     * Get the cost of the variation.
     *
     * @return float The cost of the variation.
     */
    public function getCost(): float;

    /**
     * Set the description of the variation.
     *
     * @param string $description The description of the variation.
     */
    public function setDescription(string $description): self;

    /**
     * Get the description of the variation.
     *
     * @return string The description of the variation.
     */
    public function getDescription(): string;

    /**
     * Set the dimension of the variation.
     *
     * @param DimensionInterface $dimension The dimension of the variation.
     */
    public function setDimension(DimensionInterface $dimension): self;

    /**
     * Get the dimension of the variation.
     *
     * @return DimensionInterface The dimension of the variation.
     */
    public function getDimension(): DimensionInterface;

    /**
     * Set the EAN (European Article Number) of the variation.
     *
     * @param string $ean The EAN of the variation.
     */
    public function setEan(string $ean): self;

    /**
     * Get the EAN (European Article Number) of the variation.
     *
     * @return string The EAN of the variation.
     */
    public function getEan(): string;

    /**
     * Set the handling time of the variation.
     *
     * @param UnitTimeInterface $unitTime The handling time of the variation.
     */
    public function setHandlingTime(UnitTimeInterface $unitTime): self;

    /**
     * Get the handling time of the variation.
     *
     * @return UnitTimeInterface The handling time of the variation.
     */
    public function getHandlingTime(): UnitTimeInterface;

    /**
     * Set the images of the variation.
     *
     * @param array<ImageInterface> $images The images of the variation.
     */
    public function setImages(array $images): self;

    /**
     * Get the images of the variation.
     *
     * @return array<ImageInterface> The images of the variation.
     */
    public function getImages(): array;

    /**
     * Set whether the variation is the main variation of the product.
     *
     * @param bool $isMain Whether the variation is the main variation.
     */
    public function setIsMain(bool $isMain): self;

    /**
     * Check whether the variation is the main variation of the product.
     *
     * @return bool Whether the variation is the main variation.
     */
    public function getIsMain(): bool;

    /**
     * Set the name of the variation.
     *
     * @param string $name The name of the variation.
     */
    public function setName(string $name): self;

    /**
     * Get the name of the variation.
     *
     * @return string The name of the variation.
     */
    public function getName(): string;

    /**
     * Set the prices of the variation.
     *
     * @param array<PriceInterface> $prices The prices of the variation.
     */
    public function setPrices(array $prices): self;

    /**
     * Get the prices of the variation.
     *
     * @return array<PriceInterface> The prices of the variation.
     */
    public function getPrices(): array;

    /**
     * Set the SKU (Stock Keeping Unit) of the variation.
     *
     * @param string $sku The SKU of the variation.
     */
    public function setSku(string $sku): self;

    /**
     * Get the SKU (Stock Keeping Unit) of the variation.
     *
     * @return string The SKU of the variation.
     */
    public function getSku(): string;

    /**
     * Set the SKU ID of the variation.
     *
     * @param string $skuId The SKU ID of the variation.
     */
    public function setSkuId(string $skuId): self;

    /**
     * Get the SKU ID of the variation.
     *
     * @return string The SKU ID of the variation.
     */
    public function getSkuId(): string;

    /**
     * Set the status of the variation.
     *
     * @param string $status The status of the variation.
     */
    public function setStatus(string $status): self;

    /**
     * Get the status of the variation.
     *
     * @return string The status of the variation.
     */
    public function getStatus(): string;

    /**
     * Set the stocks of the variation.
     *
     * @param array<StockInterface> $stocks The stocks of the variation.
     */
    public function setStocks(array $stocks): self;

    /**
     * Get the stocks of the variation.
     *
     * @return array<StockInterface> The stocks of the variation.
     */
    public function getStocks(): array;

    /**
     * Set the variant specification for the product.
     *
     * @param array<ValueInterface> $variantSpecification The variant specification.
     */
    public function setVariantSpecification(array $variantSpecification): self;

    /**
     * Get the variant specification for the product.
     *
     * @return array<ValueInterface> The variant specification.
     */
    public function getVariantSpecification(): array;

    /**
     * Set the warranty time of the variation.
     *
     * @param UnitTimeInterface $unitTime The warranty time of the variation.
     */
    public function setWarrantyTime(UnitTimeInterface $unitTime): self;

    /**
     * Get the warranty time of the variation.
     *
     * @return UnitTimeInterface The warranty time of the variation.
     */
    public function getWarrantyTime(): UnitTimeInterface;
}
