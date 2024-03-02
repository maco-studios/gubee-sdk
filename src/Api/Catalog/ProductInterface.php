<?php

namespace Gubee\SDK\Api\Catalog;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\OriginCountryInterface;
use Gubee\SDK\Api\Gubee\AccountInterface;
use Gubee\SDK\Api\Catalog\Product\VariationInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\AttributeValueInterface;
use Gubee\SDK\Api\Catalog\Product\KitAssociationInterface;

interface ProductInterface extends ModelInterface
{
    public const FOREIGN_DIRECTION_IMPORTATION = 'FOREIGN_DIRECTION_IMPORTATION';

    public const FOREIGN_INTERNAL_MARKET = 'FOREIGN_INTERNAL_MARKET';

    public const NATIONAL = 'NATIONAL';

    public const ORIGIN_LIST = [self::FOREIGN_DIRECTION_IMPORTATION, self::FOREIGN_INTERNAL_MARKET, self::NATIONAL];

    public const ACTIVE = 'ACTIVE';

    public const INACTIVE = 'INACTIVE';

    public const STATUS_LIST = [self::ACTIVE, self::INACTIVE];

    public const KIT = 'KIT';

    public const SIMPLE = 'SIMPLE';

    public const VARIANT = 'VARIANT';

    public const VIRTUAL = 'VIRTUAL';

    public const TYPE_LIST = [self::KIT, self::SIMPLE, self::VARIANT, self::VIRTUAL];

    /**
     * Set the accounts property
     *
     * @param array<AccountInterface> $accounts
     * @return $this
     */
    public function setAccounts(array $accounts): self;
    /**
     * Get the accounts property
     *
     * @return array<AccountInterface>
     */
    public function getAccounts(): array;
    /**
     * Set the brand id property
     *
     * @param string $brandId
     * @return $this
     */
    public function setBrandId(string $brandId): self;
    /**
     * Get the brand id property
     *
     * @return string
     */
    public function getBrandId(): string;
    /**
     * Set the category ids property
     *
     * @param array<string> $categoryIds
     * @return $this
     */
    public function setCategoryIds(array $categoryIds): self;
    /**
     * Get the category ids property
     *
     * @return array<string>
     */
    public function getCategoryIds(): array;
    /**
     * Set the created dt property
     *
     * @param DateTimeInterface $createdDt
     * @return $this
     */
    public function setCreatedDt(DateTimeInterface $createdDt): self;
    /**
     * Get the created dt property
     *
     * @return DateTimeInterface
     */
    public function getCreatedDt(): DateTimeInterface;
    /**
     * Set the external id property
     *
     * @param string $externalId
     * @return $this
     */
    public function setExternalId(string $externalId): self;
    /**
     * Get the external id property
     *
     * @return string
     */
    public function getExternalId(): string;
    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the kit associations property
     *
     * @param array<KitAssociationInterface> $kitAssociations
     * @return $this
     */
    public function setKitAssociations(array $kitAssociations): self;
    /**
     * Get the kit associations property
     *
     * @return array<KitAssociationInterface>
     */
    public function getKitAssociations(): array;
    /**
     * Set the last modified dt property
     *
     * @param DateTimeInterface $lastModifiedDt
     * @return $this
     */
    public function setLastModifiedDt(DateTimeInterface $lastModifiedDt): self;
    /**
     * Get the last modified dt property
     *
     * @return DateTimeInterface
     */
    public function getLastModifiedDt(): DateTimeInterface;
    /**
     * Set the main category id property
     *
     * @param string $mainCategoryId
     * @return $this
     */
    public function setMainCategoryId(string $mainCategoryId): self;
    /**
     * Get the main category id property
     *
     * @return string
     */
    public function getMainCategoryId(): string;
    /**
     * Set the main sku property
     *
     * @param string $mainSku
     * @return $this
     */
    public function setMainSku(string $mainSku): self;
    /**
     * Get the main sku property
     *
     * @return string
     */
    public function getMainSku(): string;
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
     * Set the nbm property
     *
     * @param string $nbm
     * @return $this
     */
    public function setNbm(string $nbm): self;
    /**
     * Get the nbm property
     *
     * @return string
     */
    public function getNbm(): string;
    /**
     * Set the origin property
     *
     * @param string $origin
     * @return $this
     */
    public function setOrigin(string $origin): self;
    /**
     * Get the origin property
     *
     * @return string
     */
    public function getOrigin(): string;
    /**
     * Set the origin country property
     *
     * @param OriginCountryInterface $originCountry
     * @return $this
     */
    public function setOriginCountry(OriginCountryInterface $originCountry): self;
    /**
     * Get the origin country property
     *
     * @return OriginCountryInterface
     */
    public function getOriginCountry(): OriginCountryInterface;
    /**
     * Set the platform property
     *
     * @param string $platform
     * @return $this
     */
    public function setPlatform(string $platform): self;
    /**
     * Get the platform property
     *
     * @return string
     */
    public function getPlatform(): string;
    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self;
    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string;
    /**
     * Set the specifications property
     *
     * @param array<AttributeValueInterface> $specifications
     * @return $this
     */
    public function setSpecifications(array $specifications): self;
    /**
     * Get the specifications property
     *
     * @return array<AttributeValueInterface>
     */
    public function getSpecifications(): array;
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
     * Set the type property
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;
    /**
     * Get the type property
     *
     * @return string
     */
    public function getType(): string;
    /**
     * Set the variant attributes property
     *
     * @param array<string> $variantAttributes
     * @return $this
     */
    public function setVariantAttributes(array $variantAttributes): self;
    /**
     * Get the variant attributes property
     *
     * @return array<string>
     */
    public function getVariantAttributes(): array;
    /**
     * Set the variations property
     *
     * @param array<VariationInterface> $variations
     * @return $this
     */
    public function setVariations(array $variations): self;
    /**
     * Get the variations property
     *
     * @return array<VariationInterface>
     */
    public function getVariations(): array;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
