<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\TypedValueInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\ValidityPeriodInterface;
use Gubee\SDK\Api\ModelInterface;

/**
 * Interface for defining the price of a product.
 */
interface PriceInterface extends TypedValueInterface, ModelInterface
{
    public const DEFAULT   = "DEFAULT";
    public const PROMOTION = "PROMOTION";

    /**
     * Sets the validity period for the price.
     *
     * @param ValidityPeriodInterface $validityPeriod The validity period for the price.
     */
    public function setValidityPeriod(ValidityPeriodInterface $validityPeriod): self;

    /**
     * Gets the validity period for the price.
     *
     * @return ValidityPeriodInterface The validity period for the price.
     */
    public function getValidityPeriod(): ValidityPeriodInterface;
}
