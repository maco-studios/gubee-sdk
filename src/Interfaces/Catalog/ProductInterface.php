<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Catalog;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\BrandInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\ValueInterface;
use Gubee\SDK\Interfaces\Catalog\Product\VariationInterface;
use Gubee\SDK\Interfaces\Gubee\AccountInterface;

interface ProductInterface
{
    // phpcs:disable
    public const FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR = "FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR";
    // phpcs:enable
    public const FOREIGN_DIRECTION_IMPORTATION    = "FOREIGN_DIRECTION_IMPORTATION";
    public const FOREIGN_INTERNAL_MARKET          = "FOREIGN_INTERNAL_MARKET";
    public const FOREIGN_WITHOUT_NATIONAL_SIMILAR = "FOREIGN_WITHOUT_NATIONAL_SIMILAR";
    public const NATIONAL                         = "NATIONAL";
    public const NATIONAL_CONFORMITY_ADJUSTMENTS  = "NATIONAL_CONFORMITY_ADJUSTMENTS";
    public const NATIONAL_IMPORTS_PLUS_40_PERCENT = "NATIONAL_IMPORTS_PLUS_40_PERCENT";
    public const NATIONAL_IMPORTS_PLUS_70_PERCENT = "NATIONAL_IMPORTS_PLUS_70_PERCENT";
    public const NATIONAL_IMPORT_MINUS_40_PERCENT = "NATIONAL_IMPORT_MINUS_40_PERCENT";
    public const ACTIVE                           = "ACTIVE";
    public const INACTIVE                         = "INACTIVE";
    public const KIT                              = "KIT";
    public const SIMPLE                           = "SIMPLE";
    public const VARIANT                          = "VARIANT";
    public const VIRTUAL                          = "VIRTUAL";

    /**
     * Get the product related accounts
     *
     * @return array<AccountInterface> An array of AccountInterface objects
     */
    public function getAccounts(): array;

    /**
     * Set the product related accounts
     *
     * @param array<AccountInterface> $accounts An array of AccountInterface objects
     * @return self The updated ProductInterface object
     */
    public function setAccounts(array $accounts): self;

    /**
     * Get the product brand entity
     *
     * @return BrandInterface The BrandInterface object
     */
    public function getBrand(): BrandInterface;

    /**
     * Set the product brand entity
     *
     * @param BrandInterface $brand The BrandInterface object
     * @return self The updated ProductInterface object
     */
    public function setBrand(BrandInterface $brand): self;

    /**
     * Set the product categories
     *
     * @param array<CategoryInterface> $categories An array of CategoryInterface objects
     * @return self The updated ProductInterface object
     */
    public function setCategories(array $categories): self;

    /**
     * Get the product categories
     *
     * @return array<CategoryInterface> An array of CategoryInterface objects
     */
    public function getCategories(): array;

    /**
     * Set the product hubee id
     *
     * @param string $hubeeId The hubee id of the product
     * @return self The updated ProductInterface object
     */
    public function setHubeeId(string $hubeeId): self;

    /**
     * Get the product hubee id
     *
     * @return string The hubee id of the product
     */
    public function getHubeeId(): string;

    /**
     * Set the product id
     *
     * @param string $id The id of the product
     * @return self The updated ProductInterface object
     */
    public function setId(string $id): self;

    /**
     * Get the product id
     *
     * @return string The id of the product
     */
    public function getId(): string;

    /**
     * Set the main category of the product
     *
     * @param CategoryInterface $mainCategory The main category of the product
     * @return self The updated ProductInterface object
     */
    public function setMainCategory(CategoryInterface $mainCategory): self;

    /**
     * Get the main category of the product
     *
     * @return CategoryInterface The main category of the product
     */
    public function getMainCategory(): CategoryInterface;

    /**
     * Set the main SKU of the product
     *
     * @param string $mainSku The main SKU of the product
     * @return self The updated ProductInterface object
     */
    public function setMainSku(string $mainSku): self;

    /**
     * Get the main SKU of the product
     *
     * @return string The main SKU of the product
     */
    public function getMainSku(): string;

    /**
     * Set the name of the product
     *
     * @param string $name The name of the product
     * @return self The updated ProductInterface object
     */
    public function setName(string $name): self;

    /**
     * Get the name of the product
     *
     * @return string The name of the product
     */
    public function getName(): string;

    /**
     * Set the NBM (Nomenclature of Brazilian Merchandise) code of the product
     *
     * @param string $nbm The NBM code of the product
     * @return self The updated ProductInterface object
     */
    public function setNbm(string $nbm): self;

    /**
     * Get the NBM (Nomenclature of Brazilian Merchandise) code of the product
     *
     * @return string The NBM code of the product
     */
    public function getNbm(): string;

    /**
     * Set the origin of the product
     *
     * @param string $origin The origin of the product
     * @return self The updated ProductInterface object
     */
    public function setOrigin(string $origin): self;

    /**
     * Get the origin of the product
     *
     * @return string The origin of the product
     */
    public function getOrigin(): string;

    /**
     * Set the product specifications
     *
     * @param array<ValueInterface> $specifications An array of ValueInterface objects representing the specifications
     * @return ProductInterface The updated ProductInterface object
     */
    public function setSpecifications(array $specifications): self;

    /**
     * Get the product specifications
     *
     * @return array<ValueInterface> An array of ValueInterface objects representing the specifications
     */
    public function getSpecifications(): array;

    /**
     * Set the status of the product
     *
     * @param string $status The status of the product
     * @return self The updated ProductInterface object
     */
    public function setStatus(string $status): self;

    /**
     * Get the status of the product
     *
     * @return string The status of the product
     */
    public function getStatus(): string;

    /**
     * Set the type of the product
     *
     * @param string $type The type of the product
     * @return self The updated ProductInterface object
     */
    public function setType(string $type): self;

    /**
     * Get the type of the product
     *
     * @return string The type of the product
     */
    public function getType(): string;

    /**
     * Set the product variant attributes
     *
     * @param array<string> $variantAttributes An array of strings representing the variant attributes
     * @return self The updated ProductInterface object
     */
    public function setVariantAttributes(array $variantAttributes): self;

    /**
     * Get the product variant attributes
     *
     * @return array<string> An array of strings representing the variant attributes
     */
    public function getVariantAttributes(): array;

    /**
     * Set the product variations
     *
     * @param array<VariationInterface> $variations An array of VariationInterface objects representing the variations
     * @return ProductInterface The updated ProductInterface object
     */
    public function setVariations(array $variations): self;

    /**
     * Get the product variations
     *
     * @return array<VariationInterface> An array of VariationInterface objects representing the variations
     */
    public function getVariations(): array;
}
