<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product\Variation;

use Gubee\SDK\Enum\AbstractEnum;

class ConditionEnum extends AbstractEnum
{
    private const NEW  = 'NEW';
    private const USED = 'USED';

    public static function NEW()
    {
        return new self(self::NEW);
    }

    public static function USED()
    {
        return new self(self::USED);
    }
}
