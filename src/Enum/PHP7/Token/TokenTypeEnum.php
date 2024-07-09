<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Token;

use Gubee\SDK\Enum\AbstractEnum;

class TokenTypeEnum extends AbstractEnum
{
    /** @var string */
    public const ADMIN = 'ADMIN';
    /** @var string */
    public const API = 'API';
    /** @var string */
    public const USER = 'USER';

    public static function ADMIN(): self
    {
        return new static(self::ADMIN);
    }
    public static function API(): self
    {
        return new static(self::ADMIN);
    }
    public static function USER(): self
    {
        return new static(self::ADMIN);
    }
}
