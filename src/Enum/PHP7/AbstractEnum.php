<?php

declare(strict_types=1);

namespace Gubee\SDK\Enum;

abstract class AbstractEnum implements \Stringable, \JsonSerializable
{
    protected string $value;

    final public function __construct(
        string $value
    ) {
        $this->setValue($value);
    }

    public static function fromValue(string $value): self
    {
        return new static($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }


    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value 
     * @return self
     */
    public function setValue(string $value): self
    {
        $reflection = new \ReflectionClass($this);
        $constants = $reflection->getConstants();
        if (!in_array($value, $constants, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The value "%s" is not part of the enum %s',
                    $value,
                    static::class
                )
            );
        }

        $this->value = $value;
        return $this;
    }
}
