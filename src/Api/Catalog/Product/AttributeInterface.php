<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product;

interface AttributeInterface
{
    /**
     * Attribute types for product attributes.
     */
    public const MULTISELECT = 'MULTISELECT';
    public const SELECT      = 'SELECT';
    public const TEXT        = 'TEXT';
    public const TEXTAREA    = 'TEXTAREA';

    /**
     * Set the attribute type.
     *
     * @param string $attrType The attribute type.
     */
    public function setAttrType(string $attrType): self;

    /**
     * Get the attribute type.
     *
     * @return string The attribute type.
     */
    public function getAttrType(): string;

    /**
     * Set the Hubee ID.
     *
     * @param string $hubeeId The Hubee ID.
     */
    public function setHubeeId(string $hubeeId): self;

    /**
     * Get the Hubee ID.
     *
     * @return string The Hubee ID.
     */
    public function getHubeeId(): string;

    /**
     * Set the label.
     *
     * @param string $label The label.
     */
    public function setLabel(string $label): self;

    /**
     * Get the label.
     *
     * @return string The label.
     */
    public function getLabel(): string;

    /**
     * Set the name.
     *
     * @param string $name The name.
     */
    public function setName(string $name): self;

    /**
     * Get the name.
     *
     * @return string The name.
     */
    public function getName(): string;

    /**
     * Check if the attribute is required.
     *
     * @return bool True if the attribute is required, false otherwise.
     */
    public function isRequired(): bool;

    /**
     * Set whether the attribute is required.
     *
     * @param bool $required True if the attribute is required, false otherwise.
     */
    public function setRequired(bool $required): self;

    /**
     * Set the options for the attribute.
     *
     * @param array<string> $options The options for the attribute.
     */
    public function setOptions(array $options): self;

    /**
     * Get the options for the attribute.
     *
     * @return array The options for the attribute.
     */
    public function getOptions(): array;

    /**
     * Check if the attribute is a variant.
     *
     * @return bool True if the attribute is a variant, false otherwise.
     */
    public function isVariant(): bool;

    /**
     * Set whether the attribute is a variant.
     *
     * @param bool $variant True if the attribute is a variant, false otherwise.
     */
    public function setVariant(bool $variant): self;
}
