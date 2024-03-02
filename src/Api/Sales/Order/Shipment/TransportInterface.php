<?php

namespace Gubee\SDK\Api\Sales\Order\Shipment;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;

interface TransportInterface extends ModelInterface
{
    /**
     * Set the carrier property
     *
     * @param string $carrier
     * @return $this
     */
    public function setCarrier(string $carrier): self;
    /**
     * Get the carrier property
     *
     * @return string
     */
    public function getCarrier(): string;
    /**
     * Set the delivered carrier date property
     *
     * @param DateTimeInterface $deliveredCarrierDate
     * @return $this
     */
    public function setDeliveredCarrierDate(DateTimeInterface $deliveredCarrierDate): self;
    /**
     * Get the delivered carrier date property
     *
     * @return DateTimeInterface
     */
    public function getDeliveredCarrierDate(): DateTimeInterface;
    /**
     * Set the link property
     *
     * @param string $link
     * @return $this
     */
    public function setLink(string $link): self;
    /**
     * Get the link property
     *
     * @return string
     */
    public function getLink(): string;
    /**
     * Set the method property
     *
     * @param string $method
     * @return $this
     */
    public function setMethod(string $method): self;
    /**
     * Get the method property
     *
     * @return string
     */
    public function getMethod(): string;
    /**
     * Set the tracking code property
     *
     * @param string $trackingCode
     * @return $this
     */
    public function setTrackingCode(string $trackingCode): self;
    /**
     * Get the tracking code property
     *
     * @return string
     */
    public function getTrackingCode(): string;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
