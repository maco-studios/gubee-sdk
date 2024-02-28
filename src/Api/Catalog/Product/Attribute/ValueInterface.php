<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

interface ValueInterface
{
    /**
     * Set the attribute name
     */
    public function setAttribute(string $attribute): self;

    /**
     * Get the attribute name
     */
    public function getAttribute(): string;

    /**
     * Set the values of the attribute
     *
     * @param array<string> $values
     */
    public function setValues(array $values): self;

    /**
     * Get the values of the attribute
     *
     * @return array<string>
     */
    public function getValues(): array;
}
