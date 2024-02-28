<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute\Dimension;

interface TypedValueInterface
{
    /**
     * Set the type of the measure.
     *
     * @param string $type The type of the measure.
     */
    public function setType(string $type): self;

    /**
     * Get the type of the measure.
     *
     * @return string The type of the measure.
     */
    public function getType(): string;

    /**
     * Set the value of the measure.
     *
     * @param float|int $value The value of the measure.
     */
    public function setValue($value): self;

    /**
     * Get the value of the measure.
     *
     * @return float|int The value of the measure.
     */
    public function getValue();
}
