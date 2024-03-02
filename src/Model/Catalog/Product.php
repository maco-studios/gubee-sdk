<?php

namespace Gubee\SDK\Model;

use DateTimeInterface;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Api\Gubee\AccountInterface;
use Gubee\SDK\Api\Catalog\ProductInterface;
use Gubee\SDK\Api\Catalog\Product\VariationInterface;
use Gubee\SDK\Api\Catalog\Product\KitAssociationInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\OriginCountryInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\AttributeValueInterface;

/**
 * Model for ProductApiV2DTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/ProductApiV2DTO
 *
 * @method self setAccounts(array accounts) Set the accounts property
 * @method array getAccounts() Get the accounts property
 * @method self setBrandId(string brandId) Set the brand id property
 * @method string getBrandId() Get the brand id property
 * @method self setCategoryIds(array categoryIds) Set the category ids property
 * @method array getCategoryIds() Get the category ids property
 * @method self setCreatedDt(DateTimeInterface createdDt) Set the created dt
 * property
 * @method DateTimeInterface getCreatedDt() Get the created dt property
 * @method self setExternalId(string externalId) Set the external id property
 * @method string getExternalId() Get the external id property
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setKitAssociations(array kitAssociations) Set the kit associations
 * property
 * @method array getKitAssociations() Get the kit associations property
 * @method self setLastModifiedDt(DateTimeInterface lastModifiedDt) Set the last
 * modified dt property
 * @method DateTimeInterface getLastModifiedDt() Get the last modified dt property
 * @method self setMainCategoryId(string mainCategoryId) Set the main category id
 * property
 * @method string getMainCategoryId() Get the main category id property
 * @method self setMainSku(string mainSku) Set the main sku property
 * @method string getMainSku() Get the main sku property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setNbm(string nbm) Set the nbm property
 * @method string getNbm() Get the nbm property
 * @method self setOrigin(string origin) Set the origin property
 * @method string getOrigin() Get the origin property
 * @method self setOriginCountry(OriginCountryInterface originCountry) Set the
 * origin country property
 * @method OriginCountryInterface getOriginCountry() Get the origin country
 * property
 * @method self setPlatform(string platform) Set the platform property
 * @method string getPlatform() Get the platform property
 * @method self setSellerId(string sellerId) Set the seller id property
 * @method string getSellerId() Get the seller id property
 * @method self setSpecifications(array specifications) Set the specifications
 * property
 * @method array getSpecifications() Get the specifications property
 * @method self setStatus(string status) Set the status property
 * @method string getStatus() Get the status property
 * @method self setType(string type) Set the type property
 * @method string getType() Get the type property
 * @method self setVariantAttributes(array variantAttributes) Set the variant
 * attributes property
 * @method array getVariantAttributes() Get the variant attributes property
 * @method self setVariations(array variations) Set the variations property
 * @method array getVariations() Get the variations property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Product extends AbstractModel implements ProductInterface
{
    /**
     * @var array<AccountInterface>
     */
    protected ?array $accounts = null;

    /**
     * @var string
     */
    protected ?string $brandId = null;

    /**
     * @var array<string>
     */
    protected array $categoryIds;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $createdDt = null;

    /**
     * @var string
     */
    protected ?string $externalId = null;

    /**
     * @var string
     */
    protected ?string $id = null;

    /**
     * @var array<KitAssociationInterface>
     */
    protected array $kitAssociations;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $lastModifiedDt = null;

    /**
     * @var string
     */
    protected ?string $mainCategoryId = null;

    /**
     * @var string
     */
    protected ?string $mainSku = null;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var string
     */
    protected ?string $nbm = null;

    /**
     * @var string
     */
    protected ?string $origin = null;

    /**
     * @var OriginCountryInterface
     */
    protected ?OriginCountryInterface $originCountry = null;

    /**
     * @var string
     */
    protected ?string $platform = null;

    /**
     * @var string
     */
    protected ?string $sellerId = null;

    /**
     * @var array<AttributeValueInterface>
     */
    protected array $specifications;

    /**
     * @var string
     */
    protected string $status;

    /**
     * @var string
     */
    protected ?string $type = null;

    /**
     * @var array<string>
     */
    protected array $variantAttributes;

    /**
     * @var array<VariationInterface>
     */
    protected array $variations;

    /**
     * Set the accounts property
     *
     * @param array<AccountInterface> $accounts
     * @return $this
     */
    public function setAccounts(array $accounts): self
    {
        foreach ($accounts as $item) {
            if (!$item instanceof AccountInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        AccountInterface::class
                    )
                );
            }
        }
        $this->accounts = $accounts;
        return $this;
    }

    /**
     * Get the accounts property
     *
     * @return array<AccountInterface>
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * Set the brand id property
     *
     * @param string $brandId
     * @return $this
     */
    public function setBrandId(string $brandId): self
    {
        $this->brandId = $brandId;
        return $this;
    }

    /**
     * Get the brand id property
     *
     * @return string
     */
    public function getBrandId(): string
    {
        return $this->brandId;
    }

    /**
     * Set the category ids property
     *
     * @param array<string> $categoryIds
     * @return $this
     */
    public function setCategoryIds(array $categoryIds): self
    {
        foreach ($categoryIds as $item) {
            if (!is_string($item)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        "string"
                    )
                );
            }
        }
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * Get the category ids property
     *
     * @return array<string>
     */
    public function getCategoryIds(): array
    {
        return $this->categoryIds;
    }

    /**
     * Set the created dt property
     *
     * @param DateTimeInterface $createdDt
     * @return $this
     */
    public function setCreatedDt(DateTimeInterface $createdDt): self
    {
        $this->createdDt = $createdDt;
        return $this;
    }

    /**
     * Get the created dt property
     *
     * @return DateTimeInterface
     */
    public function getCreatedDt(): DateTimeInterface
    {
        return $this->createdDt;
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
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the kit associations property
     *
     * @param array<KitAssociationInterface> $kitAssociations
     * @return $this
     */
    public function setKitAssociations(array $kitAssociations): self
    {
        foreach ($kitAssociations as $item) {
            if (!$item instanceof KitAssociationInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        KitAssociationInterface::class
                    )
                );
            }
        }
        $this->kitAssociations = $kitAssociations;
        return $this;
    }

    /**
     * Get the kit associations property
     *
     * @return array<KitAssociationInterface>
     */
    public function getKitAssociations(): array
    {
        return $this->kitAssociations;
    }

    /**
     * Set the last modified dt property
     *
     * @param DateTimeInterface $lastModifiedDt
     * @return $this
     */
    public function setLastModifiedDt(DateTimeInterface $lastModifiedDt): self
    {
        $this->lastModifiedDt = $lastModifiedDt;
        return $this;
    }

    /**
     * Get the last modified dt property
     *
     * @return DateTimeInterface
     */
    public function getLastModifiedDt(): DateTimeInterface
    {
        return $this->lastModifiedDt;
    }

    /**
     * Set the main category id property
     *
     * @param string $mainCategoryId
     * @return $this
     */
    public function setMainCategoryId(string $mainCategoryId): self
    {
        $this->mainCategoryId = $mainCategoryId;
        return $this;
    }

    /**
     * Get the main category id property
     *
     * @return string
     */
    public function getMainCategoryId(): string
    {
        return $this->mainCategoryId;
    }

    /**
     * Set the main sku property
     *
     * @param string $mainSku
     * @return $this
     */
    public function setMainSku(string $mainSku): self
    {
        $this->mainSku = $mainSku;
        return $this;
    }

    /**
     * Get the main sku property
     *
     * @return string
     */
    public function getMainSku(): string
    {
        return $this->mainSku;
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
     * Set the nbm property
     *
     * @param string $nbm
     * @return $this
     */
    public function setNbm(string $nbm): self
    {
        $this->nbm = $nbm;
        return $this;
    }

    /**
     * Get the nbm property
     *
     * @return string
     */
    public function getNbm(): string
    {
        return $this->nbm;
    }

    /**
     * Set the origin property
     *
     * @param string $origin
     * @return $this
     */
    public function setOrigin(string $origin): self
    {
        if (!in_array($origin, self::ORIGIN_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::ORIGIN_LIST)
                )
            );
        }

        $this->origin = $origin;
        return $this;
    }

    /**
     * Get the origin property
     *
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * Set the origin country property
     *
     * @param OriginCountryInterface $originCountry
     * @return $this
     */
    public function setOriginCountry(OriginCountryInterface $originCountry): self
    {
        $this->originCountry = $originCountry;
        return $this;
    }

    /**
     * Get the origin country property
     *
     * @return OriginCountryInterface
     */
    public function getOriginCountry(): OriginCountryInterface
    {
        return $this->originCountry;
    }

    /**
     * Set the platform property
     *
     * @param string $platform
     * @return $this
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * Get the platform property
     *
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    /**
     * Set the specifications property
     *
     * @param array<AttributeValueInterface> $specifications
     * @return $this
     */
    public function setSpecifications(array $specifications): self
    {
        foreach ($specifications as $item) {
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
        $this->specifications = $specifications;
        return $this;
    }

    /**
     * Get the specifications property
     *
     * @return array<AttributeValueInterface>
     */
    public function getSpecifications(): array
    {
        return $this->specifications;
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
     * Set the type property
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        if (!in_array($type, self::TYPE_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::TYPE_LIST)
                )
            );
        }

        $this->type = $type;
        return $this;
    }

    /**
     * Get the type property
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the variant attributes property
     *
     * @param array<string> $variantAttributes
     * @return $this
     */
    public function setVariantAttributes(array $variantAttributes): self
    {
        foreach ($variantAttributes as $item) {
            if (!is_string($item)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        "string"
                    )
                );
            }
        }
        $this->variantAttributes = $variantAttributes;
        return $this;
    }

    /**
     * Get the variant attributes property
     *
     * @return array<string>
     */
    public function getVariantAttributes(): array
    {
        return $this->variantAttributes;
    }

    /**
     * Set the variations property
     *
     * @param array<VariationInterface> $variations
     * @return $this
     */
    public function setVariations(array $variations): self
    {
        foreach ($variations as $item) {
            if (!$item instanceof VariationInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        VariationInterface::class
                    )
                );
            }
        }
        $this->variations = $variations;
        return $this;
    }

    /**
     * Get the variations property
     *
     * @return array<VariationInterface>
     */
    public function getVariations(): array
    {
        return $this->variations;
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
        if (!isset($values['categoryIds'])) {
            $missingFields[] = 'categoryIds';
        }

        if (!isset($values['kitAssociations'])) {
            $missingFields[] = 'kitAssociations';
        }

        if (!isset($values['specifications'])) {
            $missingFields[] = 'specifications';
        }

        if (!isset($values['status'])) {
            $missingFields[] = 'status';
        }

        if (!isset($values['variantAttributes'])) {
            $missingFields[] = 'variantAttributes';
        }

        if (!isset($values['variations'])) {
            $missingFields[] = 'variations';
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
