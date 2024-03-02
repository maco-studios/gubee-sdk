<?php

namespace Gubee\SDK\Api\Sales\Order;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\TrackingInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\TransportInterface;

interface ShipmentInterface extends ModelInterface
{
    /**
     * Set the additional info property
     *
     * @param array $additionalInfo
     * @return $this
     */
    public function setAdditionalInfo(array $additionalInfo): self;
    /**
     * Get the additional info property
     *
     * @return array
     */
    public function getAdditionalInfo(): array;
    /**
     * Set the code property
     *
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): self;
    /**
     * Get the code property
     *
     * @return string
     */
    public function getCode(): string;
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
     * Set the invoice key property
     *
     * @param string $invoiceKey
     * @return $this
     */
    public function setInvoiceKey(string $invoiceKey): self;
    /**
     * Get the invoice key property
     *
     * @return string
     */
    public function getInvoiceKey(): string;
    /**
     * Set the items property
     *
     * @param array<ItemInterface> $items
     * @return $this
     */
    public function setItems(array $items): self;
    /**
     * Get the items property
     *
     * @return array<ItemInterface>
     */
    public function getItems(): array;
    /**
     * Set the tracks property
     *
     * @param array<TrackingInterface> $tracks
     * @return $this
     */
    public function setTracks(array $tracks): self;
    /**
     * Get the tracks property
     *
     * @return array<TrackingInterface>
     */
    public function getTracks(): array;
    /**
     * Set the transport property
     *
     * @param TransportInterface $transport
     * @return $this
     */
    public function setTransport(TransportInterface $transport): self;
    /**
     * Get the transport property
     *
     * @return TransportInterface
     */
    public function getTransport(): TransportInterface;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
