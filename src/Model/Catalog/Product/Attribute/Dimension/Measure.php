<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\MeasureInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for MeasureDTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/MeasureDTO
 *
 * @method self setType(string type) Set the type property
 * @method string getType() Get the type property
 * @method self setValue(float value) Set the value property
 * @method float getValue() Get the value property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Measure extends AbstractModel implements MeasureInterface
{
    /**
     * @var string
     */
    protected string $type;

    /**
     * @var float
     */
    protected float $value;

    /**
     * Set the type property
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        if (!in_array($type, self::TYPE_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::TYPE_LIST)
                )
            );
        }

        $this->type = $type;
        return $this;
    }

    /**
     * Get the type property
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value property
     *
     * @param float $value
     * @return $this
     */
    public function setValue(float $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the value property
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    protected function validate(): bool
    {
        $values = get_object_vars($this);
        $missingFields = [];
        if (!isset($values['type'])) {
            $missingFields[] = 'type';
        }

        if (!isset($values['value'])) {
            $missingFields[] = 'value';
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
