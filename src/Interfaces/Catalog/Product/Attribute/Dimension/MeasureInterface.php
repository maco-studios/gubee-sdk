<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension;

interface MeasureInterface extends TypedValueInterface
{
    /**
     * @var string
     */
    public const CENTIMETER = "CENTIMETER";

    /**
     * @var string
     */
    public const METER = "METER";

    /**
     * @var string
     */
    public const MILLIMETER = "MILLIMETER";
}
