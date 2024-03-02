<?php

namespace Gubee\SDK\Model\Sales\Order\Shipment;

use DateTimeInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\TrackingInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for TrackingApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/TrackingApiDTORes
 *
 * @method self setInfo(string info) Set the info property
 * @method string getInfo() Get the info property
 * @method self setTrackDt(DateTimeInterface trackDt) Set the track dt property
 * @method DateTimeInterface getTrackDt() Get the track dt property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Tracking extends AbstractModel implements TrackingInterface
{
    /**
     * @var string
     */
    protected string $info;

    /**
     * @var DateTimeInterface
     */
    protected DateTimeInterface $trackDt;

    /**
     * Set the info property
     *
     * @param string $info
     * @return $this
     */
    public function setInfo(string $info): self
    {
        $this->info = $info;
        return $this;
    }

    /**
     * Get the info property
     *
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * Set the track dt property
     *
     * @param DateTimeInterface $trackDt
     * @return $this
     */
    public function setTrackDt(DateTimeInterface $trackDt): self
    {
        $this->trackDt = $trackDt;
        return $this;
    }

    /**
     * Get the track dt property
     *
     * @return DateTimeInterface
     */
    public function getTrackDt(): DateTimeInterface
    {
        return $this->trackDt;
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
        if (!isset($values['info'])) {
            $missingFields[] = 'info';
        }

        if (!isset($values['trackDt'])) {
            $missingFields[] = 'trackDt';
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
