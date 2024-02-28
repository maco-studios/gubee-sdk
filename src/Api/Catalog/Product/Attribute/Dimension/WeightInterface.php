<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute\Dimension;

interface WeightInterface extends TypedValueInterface
{
    /**
     * @var string
     */
    public const GRAM = "GRAM";

    /**
     * @var string
     */
    public const KILOGRAM = "KILOGRAM";
}
