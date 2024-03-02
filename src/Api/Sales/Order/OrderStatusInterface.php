<?php

namespace Gubee\SDK\Api\Sales\Order;

use DateTimeInterface;
use Gubee\SDK\Api\Gubee\Platform\PlataformIntegrationStatusInterface;
use Gubee\SDK\Api\ModelInterface;

interface OrderStatusInterface extends ModelInterface
{
    public const CANCELED = 'CANCELED';

    public const CONCLUDED = 'CONCLUDED';

    public const CREATED = 'CREATED';

    public const DELIVERED = 'DELIVERED';

    public const INVOICED = 'INVOICED';

    public const PAYED = 'PAYED';

    public const RETURNED = 'RETURNED';

    public const SHIPMENT_EXCEPTION = 'SHIPMENT_EXCEPTION';

    public const SHIPPED = 'SHIPPED';

    public const PREVIOUSSTATUS_LIST = [self::CANCELED, self::CONCLUDED, self::CREATED, self::DELIVERED, self::INVOICED, self::PAYED, self::RETURNED, self::SHIPMENT_EXCEPTION, self::SHIPPED];

    public const CUSTOMER_NOTFOUND = 'CUSTOMER_NOTFOUND';

    public const LATE_DELIVERY = 'LATE_DELIVERY';

    public const NOT_SPECIFIED = 'NOT_SPECIFIED';

    public const NO_INVENTORY = 'NO_INVENTORY';

    public const OTHER = 'OTHER';

    public const PACKAGE_LOST = 'PACKAGE_LOST';

    public const REGRET = 'REGRET';

    public const UNDEFINED = 'UNDEFINED';

    public const UNDELIVERABLE = 'UNDELIVERABLE';

    public const WRONG_ITEMS = 'WRONG_ITEMS';

    public const REASON_LIST = [self::CUSTOMER_NOTFOUND, self::LATE_DELIVERY, self::NOT_SPECIFIED, self::NO_INVENTORY, self::OTHER, self::PACKAGE_LOST, self::REGRET, self::UNDEFINED, self::UNDELIVERABLE, self::WRONG_ITEMS];

    public const STATUS_LIST = [self::CANCELED, self::CONCLUDED, self::CREATED, self::DELIVERED, self::INVOICED, self::PAYED, self::RETURNED, self::SHIPMENT_EXCEPTION, self::SHIPPED];

    /**
     * Set the cancel dt property
     *
     * @param DateTimeInterface $cancelDt
     * @return $this
     */
    public function setCancelDt(DateTimeInterface $cancelDt): self;
    /**
     * Get the cancel dt property
     *
     * @return DateTimeInterface
     */
    public function getCancelDt(): DateTimeInterface;
    /**
     * Set the delivered dt property
     *
     * @param DateTimeInterface $deliveredDt
     * @return $this
     */
    public function setDeliveredDt(DateTimeInterface $deliveredDt): self;
    /**
     * Get the delivered dt property
     *
     * @return DateTimeInterface
     */
    public function getDeliveredDt(): DateTimeInterface;
    /**
     * Set the estimated delivery dt property
     *
     * @param DateTimeInterface $estimatedDeliveryDt
     * @return $this
     */
    public function setEstimatedDeliveryDt(DateTimeInterface $estimatedDeliveryDt): self;
    /**
     * Get the estimated delivery dt property
     *
     * @return DateTimeInterface
     */
    public function getEstimatedDeliveryDt(): DateTimeInterface;
    /**
     * Set the marketplace status property
     *
     * @param string $marketplaceStatus
     * @return $this
     */
    public function setMarketplaceStatus(string $marketplaceStatus): self;
    /**
     * Get the marketplace status property
     *
     * @return string
     */
    public function getMarketplaceStatus(): string;
    /**
     * Set the plataform integration status property
     *
     * @param PlataformIntegrationStatusInterface $plataformIntegrationStatus
     * @return $this
     */
    public function setPlataformIntegrationStatus(PlataformIntegrationStatusInterface $plataformIntegrationStatus): self;
    /**
     * Get the plataform integration status property
     *
     * @return PlataformIntegrationStatusInterface
     */
    public function getPlataformIntegrationStatus(): PlataformIntegrationStatusInterface;
    /**
     * Set the previous status property
     *
     * @param string $previousStatus
     * @return $this
     */
    public function setPreviousStatus(string $previousStatus): self;
    /**
     * Get the previous status property
     *
     * @return string
     */
    public function getPreviousStatus(): string;
    /**
     * Set the reason property
     *
     * @param array<string> $reason
     * @return $this
     */
    public function setReason(array $reason): self;
    /**
     * Get the reason property
     *
     * @return array<string>
     */
    public function getReason(): array;
    /**
     * Set the shipment exception dt property
     *
     * @param DateTimeInterface $shipmentExceptionDt
     * @return $this
     */
    public function setShipmentExceptionDt(DateTimeInterface $shipmentExceptionDt): self;
    /**
     * Get the shipment exception dt property
     *
     * @return DateTimeInterface
     */
    public function getShipmentExceptionDt(): DateTimeInterface;
    /**
     * Set the status property
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self;
    /**
     * Get the status property
     *
     * @return string
     */
    public function getStatus(): string;
    /**
     * Set the status dt property
     *
     * @param DateTimeInterface $statusDt
     * @return $this
     */
    public function setStatusDt(DateTimeInterface $statusDt): self;
    /**
     * Get the status dt property
     *
     * @return DateTimeInterface
     */
    public function getStatusDt(): DateTimeInterface;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
