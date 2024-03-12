<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product\Attribute;

use Gubee\SDK\Enum\AbstractEnum;

class OriginEnum extends AbstractEnum
{
    //phpcs:disable
    private const FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR = 'FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR';
    private const FOREIGN_DIRECTION_IMPORTATION = 'FOREIGN_DIRECTION_IMPORTATION';
    private const FOREIGN_INTERNAL_MARKET = 'FOREIGN_INTERNAL_MARKET';
    private const FOREIGN_WITHOUT_NATIONAL_SIMILAR = 'FOREIGN_WITHOUT_NATIONAL_SIMILAR';
    private const NATIONAL = 'NATIONAL';
    private const NATIONAL_CONFORMITY_ADJUSTMENTS = 'NATIONAL_CONFORMITY_ADJUSTMENTS';
    private const NATIONAL_IMPORTS_PLUS_40_PERCENT = 'NATIONAL_IMPORTS_PLUS_40_PERCENT';
    private const NATIONAL_IMPORTS_PLUS_70_PERCENT = 'NATIONAL_IMPORTS_PLUS_70_PERCENT';
    private const NATIONAL_IMPORT_MINUS_40_PERCENT = 'NATIONAL_IMPORT_MINUS_40_PERCENT';

    public static function FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR() {
        return new self(self::FOREIGN_ACQUIRED_IN_THE_INTERNAL_MARKET_WITHOUT_SIMILAR);
    }
    //phpcs:enable

    public static function FOREIGN_DIRECTION_IMPORTATION()
    {
        return new self(self::FOREIGN_DIRECTION_IMPORTATION);
    }

    public static function FOREIGN_INTERNAL_MARKET()
    {
        return new self(self::FOREIGN_INTERNAL_MARKET);
    }

    public static function FOREIGN_WITHOUT_NATIONAL_SIMILAR()
    {
        return new self(self::FOREIGN_WITHOUT_NATIONAL_SIMILAR);
    }

    public static function NATIONAL()
    {
        return new self(self::NATIONAL);
    }

    public static function NATIONAL_CONFORMITY_ADJUSTMENTS()
    {
        return new self(self::NATIONAL_CONFORMITY_ADJUSTMENTS);
    }

    public static function NATIONAL_IMPORTS_PLUS_40_PERCENT()
    {
        return new self(self::NATIONAL_IMPORTS_PLUS_40_PERCENT);
    }

    public static function NATIONAL_IMPORTS_PLUS_70_PERCENT()
    {
        return new self(self::NATIONAL_IMPORTS_PLUS_70_PERCENT);
    }

    public static function NATIONAL_IMPORT_MINUS_40_PERCENT()
    {
        return new self(self::NATIONAL_IMPORT_MINUS_40_PERCENT);
    }
}
