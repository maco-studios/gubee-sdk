<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Catalog\Product;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\TypedValueInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\ValidityPeriodInterface;

/**
 * Interface for defining the price of a product.
 */
interface PriceInterface extends TypedValueInterface
{
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
