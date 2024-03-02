<?php

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\VariationInterface;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Api\Catalog\Product\Media\ImageInterface;
use Gubee\SDK\Api\Catalog\Product\Media\VideoInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\DimensionInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\DescriptionInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\AttributeValueInterface;

/**
 * Model for VariationApiV2DTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/VariationApiV2DTO
 *
 * @method self setCondition(string condition) Set the condition property
 * @method string getCondition() Get the condition property
 * @method self setCost(float cost) Set the cost property
 * @method float getCost() Get the cost property
 * @method self setDescription(string description) Set the description property
 * @method string getDescription() Get the description property
 * @method self setDimension(DimensionInterface dimension) Set the dimension
 * property
 * @method DimensionInterface getDimension() Get the dimension property
 * @method self setEan(string ean) Set the ean property
 * @method string getEan() Get the ean property
 * @method self setHandlingTime(int handlingTime) Set the handling time property
 * @method int getHandlingTime() Get the handling time property
 * @method self setImages(array images) Set the images property
 * @method array getImages() Get the images property
 * @method self setMain(bool main) Set the main property
 * @method bool getMain() Get the main property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setPlatformDescription(array platformDescription) Set the platform
 * description property
 * @method array getPlatformDescription() Get the platform description property
 * @method self setSku(string sku) Set the sku property
 * @method string getSku() Get the sku property
 * @method self setSkuId(string skuId) Set the sku id property
 * @method string getSkuId() Get the sku id property
 * @method self setStatus(string status) Set the status property
 * @method string getStatus() Get the status property
 * @method self setVariantSpecification(array variantSpecification) Set the
 * variant specification property
 * @method array getVariantSpecification() Get the variant specification property
 * @method self setVideos(array videos) Set the videos property
 * @method array getVideos() Get the videos property
 * @method self setWarrantyTime(int warrantyTime) Set the warranty time property
 * @method int getWarrantyTime() Get the warranty time property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Variation extends AbstractModel implements VariationInterface
{
    /**
     * @var string
     */
    protected string $condition;

    /**
     * @var float
     */
    protected float $cost;

    /**
     * @var string
     */
    protected ?string $description = null;

    /**
     * @var DimensionInterface
     */
    protected ?DimensionInterface $dimension = null;

    /**
     * @var string
     */
    protected ?string $ean = null;

    /**
     * @var int
     */
    protected ?int $handlingTime = null;

    /**
     * @var array<ImageInterface>
     */
    protected array $images;

    /**
     * @var bool
     */
    protected bool $main;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var array<DescriptionInterface>
     */
    protected array $platformDescription;

    /**
     * @var string
     */
    protected ?string $sku = null;

    /**
     * @var string
     */
    protected ?string $skuId = null;

    /**
     * @var string
     */
    protected string $status;

    /**
     * @var array<AttributeValueInterface>
     */
    protected array $variantSpecification;

    /**
     * @var array<VideoInterface>
     */
    protected array $videos;

    /**
     * @var int
     */
    protected ?int $warrantyTime = null;

    /**
     * Set the condition property
     *
     * @param string $condition
     * @return $this
     */
    public function setCondition(string $condition): self
    {
        if (!in_array($condition, self::CONDITION_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::CONDITION_LIST)
                )
            );
        }

        $this->condition = $condition;
        return $this;
    }

    /**
     * Get the condition property
     *
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * Set the cost property
     *
     * @param float $cost
     * @return $this
     */
    public function setCost(float $cost): self
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Get the cost property
     *
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the dimension property
     *
     * @param DimensionInterface $dimension
     * @return $this
     */
    public function setDimension(DimensionInterface $dimension): self
    {
        $this->dimension = $dimension;
        return $this;
    }

    /**
     * Get the dimension property
     *
     * @return DimensionInterface
     */
    public function getDimension(): DimensionInterface
    {
        return $this->dimension;
    }

    /**
     * Set the ean property
     *
     * @param string $ean
     * @return $this
     */
    public function setEan(string $ean): self
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * Get the ean property
     *
     * @return string
     */
    public function getEan(): string
    {
        return $this->ean;
    }

    /**
     * Set the handling time property
     *
     * @param int $handlingTime
     * @return $this
     */
    public function setHandlingTime(int $handlingTime): self
    {
        $this->handlingTime = $handlingTime;
        return $this;
    }

    /**
     * Get the handling time property
     *
     * @return int
     */
    public function getHandlingTime(): int
    {
        return $this->handlingTime;
    }

    /**
     * Set the images property
     *
     * @param array<ImageInterface> $images
     * @return $this
     */
    public function setImages(array $images): self
    {
        foreach ($images as $item) {
            if (!$item instanceof ImageInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        ImageInterface::class
                    )
                );
            }
        }
        $this->images = $images;
        return $this;
    }

    /**
     * Get the images property
     *
     * @return array<ImageInterface>
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * Set the main property
     *
     * @param bool $main
     * @return $this
     */
    public function setMain(bool $main): self
    {
        $this->main = $main;
        return $this;
    }

    /**
     * Get the main property
     *
     * @return bool
     */
    public function getMain(): bool
    {
        return $this->main;
    }

    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the platform description property
     *
     * @param array<DescriptionInterface> $platformDescription
     * @return $this
     */
    public function setPlatformDescription(array $platformDescription): self
    {
        foreach ($platformDescription as $item) {
            if (!$item instanceof DescriptionInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        DescriptionInterface::class
                    )
                );
            }
        }
        $this->platformDescription = $platformDescription;
        return $this;
    }

    /**
     * Get the platform description property
     *
     * @return array<DescriptionInterface>
     */
    public function getPlatformDescription(): array
    {
        return $this->platformDescription;
    }

    /**
     * Set the sku property
     *
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Get the sku property
     *
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
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
     * Set the status property
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self
    {
        if (!in_array($status, self::STATUS_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::STATUS_LIST)
                )
            );
        }

        $this->status = $status;
        return $this;
    }

    /**
     * Get the status property
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the variant specification property
     *
     * @param array<AttributeValueInterface> $variantSpecification
     * @return $this
     */
    public function setVariantSpecification(array $variantSpecification): self
    {
        foreach ($variantSpecification as $item) {
            if (!$item instanceof AttributeValueInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        AttributeValueInterface::class
                    )
                );
            }
        }
        $this->variantSpecification = $variantSpecification;
        return $this;
    }

    /**
     * Get the variant specification property
     *
     * @return array<AttributeValueInterface>
     */
    public function getVariantSpecification(): array
    {
        return $this->variantSpecification;
    }

    /**
     * Set the videos property
     *
     * @param array<VideoInterface> $videos
     * @return $this
     */
    public function setVideos(array $videos): self
    {
        foreach ($videos as $item) {
            if (!$item instanceof VideoInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        VideoInterface::class
                    )
                );
            }
        }
        $this->videos = $videos;
        return $this;
    }

    /**
     * Get the videos property
     *
     * @return array<VideoInterface>
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    /**
     * Set the warranty time property
     *
     * @param int $warrantyTime
     * @return $this
     */
    public function setWarrantyTime(int $warrantyTime): self
    {
        $this->warrantyTime = $warrantyTime;
        return $this;
    }

    /**
     * Get the warranty time property
     *
     * @return int
     */
    public function getWarrantyTime(): int
    {
        return $this->warrantyTime;
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
        if (!isset($values['condition'])) {
            $missingFields[] = 'condition';
        }

        if (!isset($values['cost'])) {
            $missingFields[] = 'cost';
        }

        if (!isset($values['images'])) {
            $missingFields[] = 'images';
        }

        if (!isset($values['main'])) {
            $missingFields[] = 'main';
        }

        if (!isset($values['platformDescription'])) {
            $missingFields[] = 'platformDescription';
        }

        if (!isset($values['status'])) {
            $missingFields[] = 'status';
        }

        if (!isset($values['variantSpecification'])) {
            $missingFields[] = 'variantSpecification';
        }

        if (!isset($values['videos'])) {
            $missingFields[] = 'videos';
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
