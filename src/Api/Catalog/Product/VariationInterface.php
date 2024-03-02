<?php

namespace Gubee\SDK\Api\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\Attribute\DimensionInterface;
use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\DescriptionInterface;
use Gubee\SDK\Api\Catalog\Product\Media\ImageInterface;
use Gubee\SDK\Api\Catalog\Product\Media\VideoInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\AttributeValueInterface;

interface VariationInterface extends ModelInterface
{
    public const ACTIVE = 'ACTIVE';

    public const INACTIVE = 'INACTIVE';

    public const STATUS_LIST = [self::ACTIVE, self::INACTIVE];

    public const NEW = 'NEW';

    public const USED = 'USED';

    public const CONDITION_LIST = [self::NEW , self::USED];

    /**
     * Set the condition property
     *
     * @param string $condition
     * @return $this
     */
    public function setCondition(string $condition): self;
    /**
     * Get the condition property
     *
     * @return string
     */
    public function getCondition(): string;
    /**
     * Set the cost property
     *
     * @param float $cost
     * @return $this
     */
    public function setCost(float $cost): self;
    /**
     * Get the cost property
     *
     * @return float
     */
    public function getCost(): float;
    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self;
    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string;
    /**
     * Set the dimension property
     *
     * @param DimensionInterface $dimension
     * @return $this
     */
    public function setDimension(DimensionInterface $dimension): self;
    /**
     * Get the dimension property
     *
     * @return DimensionInterface
     */
    public function getDimension(): DimensionInterface;
    /**
     * Set the ean property
     *
     * @param string $ean
     * @return $this
     */
    public function setEan(string $ean): self;
    /**
     * Get the ean property
     *
     * @return string
     */
    public function getEan(): string;
    /**
     * Set the handling time property
     *
     * @param int $handlingTime
     * @return $this
     */
    public function setHandlingTime(int $handlingTime): self;
    /**
     * Get the handling time property
     *
     * @return int
     */
    public function getHandlingTime(): int;
    /**
     * Set the images property
     *
     * @param array<ImageInterface> $images
     * @return $this
     */
    public function setImages(array $images): self;
    /**
     * Get the images property
     *
     * @return array<ImageInterface>
     */
    public function getImages(): array;
    /**
     * Set the main property
     *
     * @param bool $main
     * @return $this
     */
    public function setMain(bool $main): self;
    /**
     * Get the main property
     *
     * @return bool
     */
    public function getMain(): bool;
    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;
    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string;
    /**
     * Set the platform description property
     *
     * @param array<DescriptionInterface> $platformDescription
     * @return $this
     */
    public function setPlatformDescription(array $platformDescription): self;
    /**
     * Get the platform description property
     *
     * @return array<DescriptionInterface>
     */
    public function getPlatformDescription(): array;
    /**
     * Set the sku property
     *
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku): self;
    /**
     * Get the sku property
     *
     * @return string
     */
    public function getSku(): string;
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
     * Set the status property
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self;
    /**
     * Get the status property
     *
     * @return string
     */
    public function getStatus(): string;
    /**
     * Set the variant specification property
     *
     * @param array<AttributeValueInterface> $variantSpecification
     * @return $this
     */
    public function setVariantSpecification(array $variantSpecification): self;
    /**
     * Get the variant specification property
     *
     * @return array<AttributeValueInterface>
     */
    public function getVariantSpecification(): array;
    /**
     * Set the videos property
     *
     * @param array<VideoInterface> $videos
     * @return $this
     */
    public function setVideos(array $videos): self;
    /**
     * Get the videos property
     *
     * @return array<VideoInterface>
     */
    public function getVideos(): array;
    /**
     * Set the warranty time property
     *
     * @param int $warrantyTime
     * @return $this
     */
    public function setWarrantyTime(int $warrantyTime): self;
    /**
     * Get the warranty time property
     *
     * @return int
     */
    public function getWarrantyTime(): int;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
