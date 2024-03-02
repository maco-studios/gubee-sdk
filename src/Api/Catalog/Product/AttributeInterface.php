<?php

namespace Gubee\SDK\Api\Catalog\Product;

use Gubee\SDK\Api\ModelInterface;

interface AttributeInterface extends ModelInterface
{
    public const MULTISELECT = 'MULTISELECT';

    public const SELECT = 'SELECT';

    public const TEXT = 'TEXT';

    public const TEXTAREA = 'TEXTAREA';

    public const ATTRTYPE_LIST = [self::MULTISELECT, self::SELECT, self::TEXT, self::TEXTAREA];

    /**
     * Set the attr type property
     *
     * @param string $attrType
     * @return $this
     */
    public function setAttrType(string $attrType): self;
    /**
     * Get the attr type property
     *
     * @return string
     */
    public function getAttrType(): string;
    /**
     * Set the hubee id property
     *
     * @param string $hubeeId
     * @return $this
     */
    public function setHubeeId(string $hubeeId): self;
    /**
     * Get the hubee id property
     *
     * @return string
     */
    public function getHubeeId(): string;
    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the label property
     *
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self;
    /**
     * Get the label property
     *
     * @return string
     */
    public function getLabel(): string;
    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;
    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string;
    /**
     * Set the options property
     *
     * @param array<string> $options
     * @return $this
     */
    public function setOptions(array $options): self;
    /**
     * Get the options property
     *
     * @return array<string>
     */
    public function getOptions(): array;
    /**
     * Set the required property
     *
     * @param bool $required
     * @return $this
     */
    public function setRequired(bool $required): self;
    /**
     * Get the required property
     *
     * @return bool
     */
    public function getRequired(): bool;
    /**
     * Set the variant property
     *
     * @param bool $variant
     * @return $this
     */
    public function setVariant(bool $variant): self;
    /**
     * Get the variant property
     *
     * @return bool
     */
    public function getVariant(): bool;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
