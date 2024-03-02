<?php

namespace Gubee\SDK\Api\Sales\Order\Shipment;

use Gubee\SDK\Api\ModelInterface;

interface LogisticTypeInterface extends ModelInterface
{
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
     * Set the shipping id property
     *
     * @param string $shippingId
     * @return $this
     */
    public function setShippingId(string $shippingId): self;
    /**
     * Get the shipping id property
     *
     * @return string
     */
    public function getShippingId(): string;
    /**
     * Set the shipping mode property
     *
     * @param string $shippingMode
     * @return $this
     */
    public function setShippingMode(string $shippingMode): self;
    /**
     * Get the shipping mode property
     *
     * @return string
     */
    public function getShippingMode(): string;
}
