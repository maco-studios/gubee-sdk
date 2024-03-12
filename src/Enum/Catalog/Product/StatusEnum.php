<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product;

use Gubee\SDK\Enum\AbstractEnum;

class StatusEnum extends AbstractEnum
{
    private const ACTIVE   = 'ACTIVE';
    private const INACTIVE = 'INACTIVE';

    public static function ACTIVE()
    {
        return new self(self::ACTIVE);
    }

    public static function INACTIVE()
    {
        return new self(self::INACTIVE);
    }
}
