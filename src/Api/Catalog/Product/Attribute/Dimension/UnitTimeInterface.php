<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute\Dimension;

interface UnitTimeInterface extends TypedValueInterface
{
    public const DAYS  = "DAYS";
    public const HOURS = "HOURS";
    public const MONTH = "MONTH";
}
