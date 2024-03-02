<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Api\Catalog\Product\Attribute\AttributeValueInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for AttributeValueApiV2DTO
 * @see
 * https://api.gubee.com.br/api/swagger-ui/#/definitions/AttributeValueApiV2DTO
 *
 * @method self setAttributeId(string attributeId) Set the attribute id property
 * @method string getAttributeId() Get the attribute id property
 * @method self setValues(array values) Set the values property
 * @method array getValues() Get the values property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class AttributeValue extends AbstractModel implements AttributeValueInterface
{
    /**
     * @var string
     */
    protected ?string $attributeId = null;

    /**
     * @var array<string>
     */
    protected array $values;

    /**
     * Set the attribute id property
     *
     * @param string $attributeId
     * @return $this
     */
    public function setAttributeId(string $attributeId): self
    {
        $this->attributeId = $attributeId;
        return $this;
    }

    /**
     * Get the attribute id property
     *
     * @return string
     */
    public function getAttributeId(): string
    {
        return $this->attributeId;
    }

    /**
     * Set the values property
     *
     * @param array<string> $values
     * @return $this
     */
    public function setValues(array $values): self
    {
        foreach ($values as $item) {
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
        $this->values = $values;
        return $this;
    }

    /**
     * Get the values property
     *
     * @return array<string>
     */
    public function getValues(): array
    {
        return $this->values;
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
        if (!isset($values['values'])) {
            $missingFields[] = 'values';
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
