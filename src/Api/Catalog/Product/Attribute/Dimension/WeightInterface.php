<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Api\ModelInterface;

interface WeightInterface extends ModelInterface
{
    public const GRAM = 'GRAM';

    public const KILOGRAM = 'KILOGRAM';

    public const TYPE_LIST = [self::GRAM, self::KILOGRAM];

    /**
     * Set the type property
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;
    /**
     * Get the type property
     *
     * @return string
     */
    public function getType(): string;
    /**
     * Set the value property
     *
     * @param float $value
     * @return $this
     */
    public function setValue(float $value): self;
    /**
     * Get the value property
     *
     * @return float
     */
    public function getValue(): float;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
