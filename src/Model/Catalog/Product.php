<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Api\Catalog\CategoryInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\BrandInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\ValueInterface;
use Gubee\SDK\Api\Catalog\Product\VariationInterface;
use Gubee\SDK\Api\Catalog\ProductInterface;
use Gubee\SDK\Api\Gubee\AccountInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;
use ReflectionClass;

use function array_filter;
use function array_map;
use function get_class;
use function gettype;
use function implode;
use function in_array;
use function is_object;
use function is_string;
use function sprintf;

use const ARRAY_FILTER_USE_KEY;

class Product extends AbstractModel implements ProductInterface
{
    /** @var array<AccountInterface> */
    protected array $accounts;

    protected BrandInterface $brand;

    /** @var array<CategoryInterface> */
    protected array $categories;
    protected string $hubeeId;
    protected string $id;
    protected CategoryInterface $mainCategory;
    protected string $mainSku;
    protected string $name;
    protected string $nbm;
    protected string $origin;
    protected array $specifications;
    protected string $status;
    protected string $type;

    /** @var array<string> */
    protected array $variantAttributes;

    /** @var array<VariationInterface> */
    protected array $variations;

    /**
     * Get the product related accounts
     *
     * @return array<AccountInterface> An array of AccountInterface objects
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * Set the product related accounts
     *
     * @param array<AccountInterface> $accounts An array of AccountInterface objects
     * @return self The updated ProductInterface object
     */
    public function setAccounts(array $accounts): self
    {
        foreach ($accounts as $account) {
            if (! $account instanceof AccountInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The account must be an instance of '%s' a '%s' was given",
                        AccountInterface::class,
                        is_object($account) ? get_class($account) : gettype($account)
                    )
                );
            }
        }
        $this->accounts = $accounts;
        return $this;
    }

    /**
     * Get the product brand entity
     *
     * @return BrandInterface The BrandInterface object
     */
    public function getBrand(): BrandInterface
    {
        return $this->brand;
    }

    /**
     * Set the product brand entity
     *
     * @param BrandInterface $brand The BrandInterface object
     * @return self The updated ProductInterface object
     */
    public function setBrand(BrandInterface $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Set the product categories
     *
     * @param array<CategoryInterface> $categories An array of CategoryInterface objects
     * @return self The updated ProductInterface object
     */
    public function setCategories(array $categories): self
    {
        foreach ($categories as $category) {
            if (! $category instanceof CategoryInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The category must be an instance of '%s' a '%s' was given",
                        CategoryInterface::class,
                        is_object($category) ? get_class($category) : gettype($category)
                    )
                );
            }
        }
        $this->categories = $categories;
        return $this;
    }

    /**
     * Get the product categories
     *
     * @return array<CategoryInterface> An array of CategoryInterface objects
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * Set the product hubee id
     *
     * @param string $hubeeId The hubee id of the product
     * @return self The updated ProductInterface object
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * Get the product hubee id
     *
     * @return string The hubee id of the product
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * Set the product id
     *
     * @param string $id The id of the product
     * @return self The updated ProductInterface object
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the product id
     *
     * @return string The id of the product
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the main category of the product
     *
     * @param CategoryInterface $mainCategory The main category of the product
     * @return self The updated ProductInterface object
     */
    public function setMainCategory(CategoryInterface $mainCategory): self
    {
        $this->mainCategory = $mainCategory;
        return $this;
    }

    /**
     * Get the main category of the product
     *
     * @return CategoryInterface The main category of the product
     */
    public function getMainCategory(): CategoryInterface
    {
        return $this->mainCategory;
    }

    /**
     * Set the main SKU of the product
     *
     * @param string $mainSku The main SKU of the product
     * @return self The updated ProductInterface object
     */
    public function setMainSku(string $mainSku): self
    {
        $this->mainSku = $mainSku;
        return $this;
    }

    /**
     * Get the main SKU of the product
     *
     * @return string The main SKU of the product
     */
    public function getMainSku(): string
    {
        return $this->mainSku;
    }

    /**
     * Set the name of the product
     *
     * @param string $name The name of the product
     * @return self The updated ProductInterface object
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name of the product
     *
     * @return string The name of the product
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the NBM (Nomenclature of Brazilian Merchandise) code of the product
     *
     * @param string $nbm The NBM code of the product
     * @return self The updated ProductInterface object
     */
    public function setNbm(string $nbm): self
    {
        $this->nbm = $nbm;
        return $this;
    }

    /**
     * Get the NBM (Nomenclature of Brazilian Merchandise) code of the product
     *
     * @return string The NBM code of the product
     */
    public function getNbm(): string
    {
        return $this->nbm;
    }

    /**
     * Set the origin of the product
     *
     * @param string $origin The origin of the product
     * @return self The updated ProductInterface object
     */
    public function setOrigin(string $origin): self
    {
        $origins = [
            self::FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR,
            self::FOREIGN_DIRECTION_IMPORTATION,
            self::FOREIGN_INTERNAL_MARKET,
            self::FOREIGN_WITHOUT_NATIONAL_SIMILAR,
            self::NATIONAL,
            self::NATIONAL_CONFORMITY_ADJUSTMENTS,
            self::NATIONAL_IMPORTS_PLUS_40_PERCENT,
            self::NATIONAL_IMPORTS_PLUS_70_PERCENT,
            self::NATIONAL_IMPORT_MINUS_40_PERCENT,
        ];
        if (
            ! in_array(
                $origin,
                $origins,
            )
        ) {
            throw new InvalidArgumentException(
                sprintf(
                    "The origin must be one of the following: '%s' a '%s' was given",
                    implode("', '", $origins),
                    is_object($origin) ? get_class($origin) : gettype($origin)
                )
            );
        }

        $this->origin = $origin;
        return $this;
    }

    /**
     * Get the origin of the product
     *
     * @return string The origin of the product
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * Set the product specifications
     *
     * @param array<ValueInterface> $specifications An array of ValueInterface objects representing the specifications
     * @return ProductInterface The updated ProductInterface object
     */
    public function setSpecifications(array $specifications): self
    {
        foreach ($specifications as $specification) {
            if (! $specification instanceof ValueInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The specification must be an instance of '%s' a '%s' was given",
                        ValueInterface::class,
                        is_object($specification) ? get_class($specification) : gettype($specification)
                    )
                );
            }
        }
        $this->specifications = $specifications;
        return $this;
    }

    /**
     * Get the product specifications
     *
     * @return array<ValueInterface> An array of ValueInterface objects representing the specifications
     */
    public function getSpecifications(): array
    {
        return $this->specifications;
    }

    /**
     * Set the status of the product
     *
     * @param string $status The status of the product
     * @return self The updated ProductInterface object
     */
    public function setStatus(string $status): self
    {
        $statusList = [
            self::ACTIVE,
            self::INACTIVE,
        ];

        if (
            ! in_array(
                $status,
                $statusList,
            )
        ) {
            throw new InvalidArgumentException(
                sprintf(
                    "The status must be one of the following: '%s' a '%s' was given",
                    implode("', '", $statusList),
                    is_object($status) ? get_class($status) : gettype($status)
                )
            );
        }

        $this->status = $status;
        return $this;
    }

    /**
     * Get the status of the product
     *
     * @return string The status of the product
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the type of the product
     *
     * @param string $type The type of the product
     * @return self The updated ProductInterface object
     */
    public function setType(string $type): self
    {
        $types = [
            self::KIT,
            self::SIMPLE,
            self::VARIANT,
            self::VIRTUAL,
        ];
        if (! in_array($type, $types, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The type must be one of the following: '%s' a '%s' was given",
                    implode("', '", $types),
                    is_object($type) ? get_class($type) : gettype($type)
                )
            );
        }

        $this->type = $type;
        return $this;
    }

    /**
     * Get the type of the product
     *
     * @return string The type of the product
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the product variant attributes
     *
     * @param array<string> $variantAttributes An array of strings representing the variant attributes
     * @return self The updated ProductInterface object
     */
    public function setVariantAttributes(array $variantAttributes): self
    {
        foreach ($variantAttributes as $variantAttribute) {
            if (! is_string($variantAttribute)) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The variant attribute must be a string a '%s' was given",
                        is_object($variantAttribute) ? get_class($variantAttribute) : gettype($variantAttribute)
                    )
                );
            }
        }

        $this->variantAttributes = $variantAttributes;
        return $this;
    }

    /**
     * Get the product variant attributes
     *
     * @return array<string> An array of strings representing the variant attributes
     */
    public function getVariantAttributes(): array
    {
        return $this->variantAttributes;
    }

    /**
     * Set the product variations
     *
     * @param array<VariationInterface> $variations An array of VariationInterface objects representing the variations
     * @return ProductInterface The updated ProductInterface object
     */
    public function setVariations(array $variations): self
    {
        foreach ($variations as $variation) {
            if (! $variation instanceof VariationInterface) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The variation must be an instance of '%s' a '%s' was given",
                        VariationInterface::class,
                        is_object($variation) ? get_class($variation) : gettype($variation)
                    )
                );
            }
        }
        $this->variations = $variations;
        return $this;
    }

    /**
     * Get the product variations
     *
     * @return array<VariationInterface> An array of VariationInterface objects representing the variations
     */
    public function getVariations(): array
    {
        return $this->variations;
    }

    /**
     * Serialize the object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $values     = parent::jsonSerialize();
        $properties = (new ReflectionClass(self::class))->getProperties();
        /**
         * Filter array based on the class properties
         */
        $values = array_filter($values, function ($key) use ($properties) {
            return in_array($key, array_map(function ($property) {
                return $property->getName();
            }, $properties));
        }, ARRAY_FILTER_USE_KEY);

        if (isset($values['mainCategory'])) {
            $values['mainCategory'] = $values['mainCategory']->getId();
        }

        if (isset($values['brand'])) {
            $values['brand'] = $values['brand']->getId();
        }

        if (isset($values['categories'])) {
            $values['categories'] = array_map(function ($category) {
                return $category->getId();
            }, $values['categories']);
        }

        return array_filter($values);
    }
}
