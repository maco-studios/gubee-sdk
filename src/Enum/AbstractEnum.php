<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum;

use InvalidArgumentException;
use ReflectionClass;
use Stringable;

use function in_array;
use function sprintf;

abstract class AbstractEnum implements Stringable
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(string $value): void
    {
        $reflection = new ReflectionClass(static::class);
        $constants  = $reflection->getConstants();
        if (! in_array($value, $constants)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for enum %s",
                    $value,
                    static::class
                )
            );
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
