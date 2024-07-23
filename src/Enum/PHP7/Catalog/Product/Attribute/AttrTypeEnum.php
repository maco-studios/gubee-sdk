<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product\Attribute;

use Gubee\SDK\Enum\AbstractEnum;

class AttrTypeEnum extends AbstractEnum
{
    /** @var string */
    public const TEXTAREA = 'TEXTAREA';
    /** @var string */
    public const SELECT = 'SELECT';
    /** @var string */
    public const TEXT = 'TEXT';
    /** @var string */
    public const MULTISELECT = 'MULTISELECT';

    public static function TEXTAREA(): self
    {
        return new self(self::TEXTAREA);
    }
    public static function SELECT(): self
    {
        return new self(self::TEXTAREA);
    }
    public static function TEXT(): self
    {
        return new self(self::TEXTAREA);
    }
    public static function MULTISELECT(): self
    {
        return new self(self::TEXTAREA);
    }
}
