<?php

namespace Gubee\SDK\Api\Sales\Order\Shipment;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;

interface TrackingInterface extends ModelInterface
{
    /**
     * Set the info property
     *
     * @param string $info
     * @return $this
     */
    public function setInfo(string $info): self;
    /**
     * Get the info property
     *
     * @return string
     */
    public function getInfo(): string;
    /**
     * Set the track dt property
     *
     * @param DateTimeInterface $trackDt
     * @return $this
     */
    public function setTrackDt(DateTimeInterface $trackDt): self;
    /**
     * Get the track dt property
     *
     * @return DateTimeInterface
     */
    public function getTrackDt(): DateTimeInterface;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
