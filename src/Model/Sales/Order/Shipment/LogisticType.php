<?php

namespace Gubee\SDK\Model\Sales\Order\Shipment;

use Gubee\SDK\Api\Sales\Order\Shipment\LogisticTypeInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for LogisticTypeApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/LogisticTypeApiDTORes
 *
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setShippingId(string shippingId) Set the shipping id property
 * @method string getShippingId() Get the shipping id property
 * @method self setShippingMode(string shippingMode) Set the shipping mode
 * property
 * @method string getShippingMode() Get the shipping mode property
 * @method array jsonSerialize() Serialize the model to an array
 */
class LogisticType extends AbstractModel implements LogisticTypeInterface
{
    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var string
     */
    protected ?string $shippingId = null;

    /**
     * @var string
     */
    protected ?string $shippingMode = null;

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
     * Set the shipping id property
     *
     * @param string $shippingId
     * @return $this
     */
    public function setShippingId(string $shippingId): self
    {
        $this->shippingId = $shippingId;
        return $this;
    }

    /**
     * Get the shipping id property
     *
     * @return string
     */
    public function getShippingId(): string
    {
        return $this->shippingId;
    }

    /**
     * Set the shipping mode property
     *
     * @param string $shippingMode
     * @return $this
     */
    public function setShippingMode(string $shippingMode): self
    {
        $this->shippingMode = $shippingMode;
        return $this;
    }

    /**
     * Get the shipping mode property
     *
     * @return string
     */
    public function getShippingMode(): string
    {
        return $this->shippingMode;
    }
}
