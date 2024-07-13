<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum\Token;

enum TokenTypeEnum: string
{
    case API = 'API';
    case ADMIN = 'ADMIN';
    case USER = 'USER';

    public static function fromValue(string $value): self
    {
        return match ($value) {
            'API' => self::API,
            'ADMIN' => self::ADMIN,
            'USER' => self::USER,
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
            self::API,
            self::ADMIN,
            self::USER,
        ];
    }

    public static function API(): self
    {
        return self::API;
    }

    public static function ADMIN(): self
    {
        return self::ADMIN;
    }

    public static function USER(): self
    {
        return self::USER;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }


}
