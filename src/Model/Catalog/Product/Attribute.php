<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\AttributeInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;
use ReflectionClass;

use function implode;
use function in_array;
use function is_string;
use function sprintf;

class Attribute extends AbstractModel implements AttributeInterface
{
    protected string $attrType;
    protected string $id;
    protected string $hubeeId;
    protected string $label;
    protected string $name;
    protected bool $required;

    /** @var array<string> */
    protected array $options;
    protected bool $variant = false;

    /**
     * Set the attribute ID.
     *
     * @param string $id The attribute ID.
     * @return AttributeInterface
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the attribute ID.
     *
     * @return string The attribute ID.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the attribute type.
     *
     * @param string $attrType The attribute type.
     */
    public function setAttrType(string $attrType): self
    {
        $consts = (new ReflectionClass($this))->getConstants();
        if (! in_array($attrType, $consts)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The type '%s' is not valid. The valid types are: %s",
                    $attrType,
                    implode(", ", $consts)
                )
            );
        }
        $this->attrType = $attrType;
        return $this;
    }

    /**
     * Get the attribute type.
     *
     * @return string The attribute type.
     */
    public function getAttrType(): string
    {
        return $this->attrType;
    }

    /**
     * Set the Hubee ID.
     *
     * @param string $hubeeId The Hubee ID.
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * Get the Hubee ID.
     *
     * @return string The Hubee ID.
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * Set the label.
     *
     * @param string $label The label.
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Get the label.
     *
     * @return string The label.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name.
     *
     * @return string The name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Check if the attribute is required.
     *
     * @return bool True if the attribute is required, false otherwise.
     */
    public function isRequired(): bool
    {
        return $this->required === true;
    }

    /**
     * Set whether the attribute is required.
     *
     * @param bool $required True if the attribute is required, false otherwise.
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;
        return $this;
    }

    /**
     * Set the options for the attribute.
     *
     * @param array<string> $options The options for the attribute.
     */
    public function setOptions(array $options): self
    {
        foreach ($options as $option) {
            if (! is_string($option)) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The option '%s' is not valid. The options must be an array of strings.",
                        $option
                    )
                );
            }
        }

        $this->options = $options;
        return $this;
    }

    /**
     * Get the options for the attribute.
     *
     * @return array The options for the attribute.
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Check if the attribute is a variant.
     *
     * @return bool True if the attribute is a variant, false otherwise.
     */
    public function isVariant(): bool
    {
        return $this->variant === true;
    }

    /**
     * Set whether the attribute is a variant.
     *
     * @param bool $variant True if the attribute is a variant, false otherwise.
     */
    public function setVariant(bool $variant): self
    {
        $this->variant = $variant;
        return $this;
    }
}
