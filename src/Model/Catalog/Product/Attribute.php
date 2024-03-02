<?php

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\AttributeInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for AttributeApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/AttributeApiDTORes
 *
 * @method self setAttrType(string attrType) Set the attr type property
 * @method string getAttrType() Get the attr type property
 * @method self setHubeeId(string hubeeId) Set the hubee id property
 * @method string getHubeeId() Get the hubee id property
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setLabel(string label) Set the label property
 * @method string getLabel() Get the label property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setOptions(array options) Set the options property
 * @method array getOptions() Get the options property
 * @method self setRequired(bool required) Set the required property
 * @method bool getRequired() Get the required property
 * @method self setVariant(bool variant) Set the variant property
 * @method bool getVariant() Get the variant property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Attribute extends AbstractModel implements AttributeInterface
{
    /**
     * @var string
     */
    protected string $attrType;

    /**
     * @var string
     */
    protected ?string $hubeeId = null;

    /**
     * @var string
     */
    protected ?string $id = null;

    /**
     * @var string
     */
    protected ?string $label = null;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var array<string>
     */
    protected array $options;

    /**
     * @var bool
     */
    protected bool $required;

    /**
     * @var bool
     */
    protected bool $variant;

    /**
     * Set the attr type property
     *
     * @param string $attrType
     * @return $this
     */
    public function setAttrType(string $attrType): self
    {
        if (!in_array($attrType, self::ATTRTYPE_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::ATTRTYPE_LIST)
                )
            );
        }

        $this->attrType = $attrType;
        return $this;
    }

    /**
     * Get the attr type property
     *
     * @return string
     */
    public function getAttrType(): string
    {
        return $this->attrType;
    }

    /**
     * Set the hubee id property
     *
     * @param string $hubeeId
     * @return $this
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * Get the hubee id property
     *
     * @return string
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the label property
     *
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Get the label property
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the options property
     *
     * @param array<string> $options
     * @return $this
     */
    public function setOptions(array $options): self
    {
        foreach ($options as $item) {
            if (!is_string($item)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        "string"
                    )
                );
            }
        }
        $this->options = $options;
        return $this;
    }

    /**
     * Get the options property
     *
     * @return array<string>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Set the required property
     *
     * @param bool $required
     * @return $this
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;
        return $this;
    }

    /**
     * Get the required property
     *
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * Set the variant property
     *
     * @param bool $variant
     * @return $this
     */
    public function setVariant(bool $variant): self
    {
        $this->variant = $variant;
        return $this;
    }

    /**
     * Get the variant property
     *
     * @return bool
     */
    public function getVariant(): bool
    {
        return $this->variant;
    }

    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool
    {
        $values = get_object_vars($this);
        $missingFields = [];
        if (!isset($values['attrType'])) {
            $missingFields[] = 'attrType';
        }

        if (!isset($values['name'])) {
            $missingFields[] = 'name';
        }

        if (!isset($values['options'])) {
            $missingFields[] = 'options';
        }

        if (!isset($values['required'])) {
            $missingFields[] = 'required';
        }

        if (!isset($values['variant'])) {
            $missingFields[] = 'variant';
        }

        if ($missingFields) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be set",
                    implode("', '", $missingFields)
                )
            );
        }
        return true;
    }
}
