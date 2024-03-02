<?php

namespace Gubee\SDK\Model\Sales\Order;

use DateTimeInterface;
use Gubee\SDK\Api\Gubee\Platform\PlataformIntegrationStatusInterface;
use Gubee\SDK\Api\Sales\Order\OrderStatusInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for OrderStatusApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/OrderStatusApiDTORes
 *
 * @method self setCancelDt(DateTimeInterface cancelDt) Set the cancel dt property
 * @method DateTimeInterface getCancelDt() Get the cancel dt property
 * @method self setDeliveredDt(DateTimeInterface deliveredDt) Set the delivered dt
 * property
 * @method DateTimeInterface getDeliveredDt() Get the delivered dt property
 * @method self setEstimatedDeliveryDt(DateTimeInterface estimatedDeliveryDt) Set
 * the estimated delivery dt property
 * @method DateTimeInterface getEstimatedDeliveryDt() Get the estimated delivery
 * dt property
 * @method self setMarketplaceStatus(string marketplaceStatus) Set the marketplace
 * status property
 * @method string getMarketplaceStatus() Get the marketplace status property
 * @method self setPlataformIntegrationStatus(PlataformIntegrationStatusInterface
 * plataformIntegrationStatus) Set the plataform integration status property
 * @method PlataformIntegrationStatusInterface getPlataformIntegrationStatus() Get
 * the plataform integration status property
 * @method self setPreviousStatus(string previousStatus) Set the previous status
 * property
 * @method string getPreviousStatus() Get the previous status property
 * @method self setReason(array reason) Set the reason property
 * @method array getReason() Get the reason property
 * @method self setShipmentExceptionDt(DateTimeInterface shipmentExceptionDt) Set
 * the shipment exception dt property
 * @method DateTimeInterface getShipmentExceptionDt() Get the shipment exception
 * dt property
 * @method self setStatus(string status) Set the status property
 * @method string getStatus() Get the status property
 * @method self setStatusDt(DateTimeInterface statusDt) Set the status dt property
 * @method DateTimeInterface getStatusDt() Get the status dt property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class OrderStatus extends AbstractModel implements OrderStatusInterface
{
    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $cancelDt = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $deliveredDt = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $estimatedDeliveryDt = null;

    /**
     * @var string
     */
    protected string $marketplaceStatus;

    /**
     * @var PlataformIntegrationStatusInterface
     */
    protected PlataformIntegrationStatusInterface $plataformIntegrationStatus = null;

    /**
     * @var string
     */
    protected ?string $previousStatus = null;

    /**
     * @var array<string>
     */
    protected array $reason = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $shipmentExceptionDt = null;

    /**
     * @var string
     */
    protected string $status;

    /**
     * @var DateTimeInterface
     */
    protected DateTimeInterface $statusDt;

    /**
     * Set the cancel dt property
     *
     * @param DateTimeInterface $cancelDt
     * @return $this
     */
    public function setCancelDt(DateTimeInterface $cancelDt): self
    {
        $this->cancelDt = $cancelDt;
        return $this;
    }

    /**
     * Get the cancel dt property
     *
     * @return DateTimeInterface
     */
    public function getCancelDt(): DateTimeInterface
    {
        return $this->cancelDt;
    }

    /**
     * Set the delivered dt property
     *
     * @param DateTimeInterface $deliveredDt
     * @return $this
     */
    public function setDeliveredDt(DateTimeInterface $deliveredDt): self
    {
        $this->deliveredDt = $deliveredDt;
        return $this;
    }

    /**
     * Get the delivered dt property
     *
     * @return DateTimeInterface
     */
    public function getDeliveredDt(): DateTimeInterface
    {
        return $this->deliveredDt;
    }

    /**
     * Set the estimated delivery dt property
     *
     * @param DateTimeInterface $estimatedDeliveryDt
     * @return $this
     */
    public function setEstimatedDeliveryDt(DateTimeInterface $estimatedDeliveryDt): self
    {
        $this->estimatedDeliveryDt = $estimatedDeliveryDt;
        return $this;
    }

    /**
     * Get the estimated delivery dt property
     *
     * @return DateTimeInterface
     */
    public function getEstimatedDeliveryDt(): DateTimeInterface
    {
        return $this->estimatedDeliveryDt;
    }

    /**
     * Set the marketplace status property
     *
     * @param string $marketplaceStatus
     * @return $this
     */
    public function setMarketplaceStatus(string $marketplaceStatus): self
    {
        $this->marketplaceStatus = $marketplaceStatus;
        return $this;
    }

    /**
     * Get the marketplace status property
     *
     * @return string
     */
    public function getMarketplaceStatus(): string
    {
        return $this->marketplaceStatus;
    }

    /**
     * Set the plataform integration status property
     *
     * @param PlataformIntegrationStatusInterface $plataformIntegrationStatus
     * @return $this
     */
    public function setPlataformIntegrationStatus(PlataformIntegrationStatusInterface $plataformIntegrationStatus): self
    {
        $this->plataformIntegrationStatus = $plataformIntegrationStatus;
        return $this;
    }

    /**
     * Get the plataform integration status property
     *
     * @return PlataformIntegrationStatusInterface
     */
    public function getPlataformIntegrationStatus(): PlataformIntegrationStatusInterface
    {
        return $this->plataformIntegrationStatus;
    }

    /**
     * Set the previous status property
     *
     * @param string $previousStatus
     * @return $this
     */
    public function setPreviousStatus(string $previousStatus): self
    {
        if (!in_array($previousStatus, self::PREVIOUSSTATUS_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::PREVIOUSSTATUS_LIST)
                )
            );
        }

        $this->previousStatus = $previousStatus;
        return $this;
    }

    /**
     * Get the previous status property
     *
     * @return string
     */
    public function getPreviousStatus(): string
    {
        return $this->previousStatus;
    }

    /**
     * Set the reason property
     *
     * @param array<string> $reason
     * @return $this
     */
    public function setReason(array $reason): self
    {
        foreach ($reason as $item) {
            if (!is_string($item)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        "string"
                    )
                );
            }
        }
        $this->reason = $reason;
        return $this;
    }

    /**
     * Get the reason property
     *
     * @return array<string>
     */
    public function getReason(): array
    {
        return $this->reason;
    }

    /**
     * Set the shipment exception dt property
     *
     * @param DateTimeInterface $shipmentExceptionDt
     * @return $this
     */
    public function setShipmentExceptionDt(DateTimeInterface $shipmentExceptionDt): self
    {
        $this->shipmentExceptionDt = $shipmentExceptionDt;
        return $this;
    }

    /**
     * Get the shipment exception dt property
     *
     * @return DateTimeInterface
     */
    public function getShipmentExceptionDt(): DateTimeInterface
    {
        return $this->shipmentExceptionDt;
    }

    /**
     * Set the status property
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self
    {
        if (!in_array($status, self::STATUS_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::STATUS_LIST)
                )
            );
        }

        $this->status = $status;
        return $this;
    }

    /**
     * Get the status property
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the status dt property
     *
     * @param DateTimeInterface $statusDt
     * @return $this
     */
    public function setStatusDt(DateTimeInterface $statusDt): self
    {
        $this->statusDt = $statusDt;
        return $this;
    }

    /**
     * Get the status dt property
     *
     * @return DateTimeInterface
     */
    public function getStatusDt(): DateTimeInterface
    {
        return $this->statusDt;
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
        if (!isset($values['marketplaceStatus'])) {
            $missingFields[] = 'marketplaceStatus';
        }

        if (!isset($values['status'])) {
            $missingFields[] = 'status';
        }

        if (!isset($values['statusDt'])) {
            $missingFields[] = 'statusDt';
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
