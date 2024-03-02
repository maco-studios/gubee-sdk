<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;

interface AttributeValueInterface extends ModelInterface
{
    /**
     * Set the attribute id property
     *
     * @param string $attributeId
     * @return $this
     */
    public function setAttributeId(string $attributeId): self;
    /**
     * Get the attribute id property
     *
     * @return string
     */
    public function getAttributeId(): string;
    /**
     * Set the values property
     *
     * @param array<string> $values
     * @return $this
     */
    public function setValues(array $values): self;
    /**
     * Get the values property
     *
     * @return array<string>
     */
    public function getValues(): array;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
