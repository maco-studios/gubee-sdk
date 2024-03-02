<?php

namespace Gubee\SDK\Model\Sales\Order;

use Gubee\SDK\Api\Sales\Order\DocumentInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for DocumentRes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/DocumentRes
 *
 * @method self setNumber(string number) Set the number property
 * @method string getNumber() Get the number property
 * @method self setType(string type) Set the type property
 * @method string getType() Get the type property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Document extends AbstractModel implements DocumentInterface
{
    /**
     * @var string
     */
    protected ?string $number = null;

    /**
     * @var string
     */
    protected ?string $type = null;

    /**
     * Set the number property
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get the number property
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

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
}
