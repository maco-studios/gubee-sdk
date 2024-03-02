<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Api\Catalog\Product\Attribute\UnitTimeInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for UnitTimeRes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/UnitTimeRes
 *
 * @method self setType(string type) Set the type property
 * @method string getType() Get the type property
 * @method self setValue(int value) Set the value property
 * @method int getValue() Get the value property
 * @method array jsonSerialize() Serialize the model to an array
 */
class UnitTime extends AbstractModel implements UnitTimeInterface
{
    /**
     * @var string
     */
    protected ?string $type = null;

    /**
     * @var int
     */
    protected ?int $value = null;

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
     * @param int $value
     * @return $this
     */
    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the value property
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
