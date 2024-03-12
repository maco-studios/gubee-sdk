<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product;

class TypeEnum extends StatusEnum
{
    private const KIT     = 'KIT';
    private const SIMPLE  = 'SIMPLE';
    private const VARIANT = 'VARIANT';
    private const VIRTUAL = 'VIRTUAL';

    public static function KIT()
    {
        return new self(self::KIT);
    }

    public static function SIMPLE()
    {
        return new self(self::SIMPLE);
    }

    public static function VARIANT()
    {
        return new self(self::VARIANT);
    }

    public static function VIRTUAL()
    {
        return new self(self::VIRTUAL);
    }
}
