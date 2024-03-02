<?php

namespace Gubee\SDK\Model\Sales\Order\Shipment;

use DateTimeInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\TransportInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for TransportApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/TransportApiDTORes
 *
 * @method self setCarrier(string carrier) Set the carrier property
 * @method string getCarrier() Get the carrier property
 * @method self setDeliveredCarrierDate(DateTimeInterface deliveredCarrierDate)
 * Set the delivered carrier date property
 * @method DateTimeInterface getDeliveredCarrierDate() Get the delivered carrier
 * date property
 * @method self setLink(string link) Set the link property
 * @method string getLink() Get the link property
 * @method self setMethod(string method) Set the method property
 * @method string getMethod() Get the method property
 * @method self setTrackingCode(string trackingCode) Set the tracking code
 * property
 * @method string getTrackingCode() Get the tracking code property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Transport extends AbstractModel implements TransportInterface
{
    /**
     * @var string
     */
    protected string $carrier;

    /**
     * @var DateTimeInterface
     */
    protected DateTimeInterface $deliveredCarrierDate;

    /**
     * @var string
     */
    protected ?string $link = null;

    /**
     * @var string
     */
    protected string $method;

    /**
     * @var string
     */
    protected ?string $trackingCode = null;

    /**
     * Set the carrier property
     *
     * @param string $carrier
     * @return $this
     */
    public function setCarrier(string $carrier): self
    {
        $this->carrier = $carrier;
        return $this;
    }

    /**
     * Get the carrier property
     *
     * @return string
     */
    public function getCarrier(): string
    {
        return $this->carrier;
    }

    /**
     * Set the delivered carrier date property
     *
     * @param DateTimeInterface $deliveredCarrierDate
     * @return $this
     */
    public function setDeliveredCarrierDate(DateTimeInterface $deliveredCarrierDate): self
    {
        $this->deliveredCarrierDate = $deliveredCarrierDate;
        return $this;
    }

    /**
     * Get the delivered carrier date property
     *
     * @return DateTimeInterface
     */
    public function getDeliveredCarrierDate(): DateTimeInterface
    {
        return $this->deliveredCarrierDate;
    }

    /**
     * Set the link property
     *
     * @param string $link
     * @return $this
     */
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Get the link property
     *
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Set the method property
     *
     * @param string $method
     * @return $this
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Get the method property
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Set the tracking code property
     *
     * @param string $trackingCode
     * @return $this
     */
    public function setTrackingCode(string $trackingCode): self
    {
        $this->trackingCode = $trackingCode;
        return $this;
    }

    /**
     * Get the tracking code property
     *
     * @return string
     */
    public function getTrackingCode(): string
    {
        return $this->trackingCode;
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
        if (!isset($values['carrier'])) {
            $missingFields[] = 'carrier';
        }

        if (!isset($values['deliveredCarrierDate'])) {
            $missingFields[] = 'deliveredCarrierDate';
        }

        if (!isset($values['method'])) {
            $missingFields[] = 'method';
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
