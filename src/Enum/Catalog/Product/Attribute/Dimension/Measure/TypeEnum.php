<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product\Attribute\Dimension\Measure;
use Gubee\SDK\Enum\AbstractEnum;

class TypeEnum extends AbstractEnum
{
    private const CENTIMETER = 'CENTIMETER';
    private const METER = 'METER';
    private const MILLIMETER    = 'MILLIMETER';
    
    
    public static function CENTIMETER():self {
        return new self(self::CENTIMETER);
    }
    
    public static function METER():self {
        return new self(self::METER);
    }
    
    public static function MILLIMETER():self {
        return new self(self::MILLIMETER);
    }

}
