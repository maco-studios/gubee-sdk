<?php

namespace Gubee\SDK\Model\Sales\Order\OrderCustomer;

use Gubee\SDK\Api\Sales\Order\OrderCustomer\PhoneInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for PhoneRes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/PhoneRes
 *
 * @method self setDdd(int ddd) Set the ddd property
 * @method int getDdd() Get the ddd property
 * @method self setNumber(string number) Set the number property
 * @method string getNumber() Get the number property
 * @method self setType(string type) Set the type property
 * @method string getType() Get the type property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Phone extends AbstractModel implements PhoneInterface
{
    /**
     * @var int
     */
    protected ?int $ddd = null;

    /**
     * @var string
     */
    protected ?string $number = null;

    /**
     * @var string
     */
    protected ?string $type = null;

    /**
     * Set the ddd property
     *
     * @param int $ddd
     * @return $this
     */
    public function setDdd(int $ddd): self
    {
        $this->ddd = $ddd;
        return $this;
    }

    /**
     * Get the ddd property
     *
     * @return int
     */
    public function getDdd(): int
    {
        return $this->ddd;
    }

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
