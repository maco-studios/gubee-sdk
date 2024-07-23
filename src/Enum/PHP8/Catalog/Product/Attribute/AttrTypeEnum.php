<?php


declare(strict_types=1);

namespace Gubee\SDK\Enum\Catalog\Product\Attribute;

enum AttrTypeEnum: string
{

    case TEXTAREA = 'TEXTAREA';
    case SELECT = 'SELECT';
    case TEXT = 'TEXT';
    case MULTISELECT = 'MULTISELECT';

    public static function fromValue(string $value): self
    {
        return match ($value) {
            'TEXTAREA' => self::TEXTAREA,
            'SELECT' => self::SELECT,
            'TEXT' => self::TEXT,
            'MULTISELECT' => self::MULTISELECT,
            default => throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s', must be one of '%s'",
                    $value,
                    implode("', '", self::toArray())
                )
            ),
        };
    }

    public static function toArray(): array
    {
        return [
            self::TEXTAREA,
            self::SELECT,
            self::TEXT,
            self::MULTISELECT,
        ];
    }

    public static function TEXTAREA(): self
    {
        return self::TEXTAREA;
    }
    public static function SELECT(): self
    {
        return self::SELECT;
    }
    public static function TEXT(): self
    {
        return self::TEXT;
    }
    public static function MULTISELECT(): self
    {
        return self::MULTISELECT;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
