<?php

namespace Gubee\SDK\Model\Sales\Order;

use DateTimeInterface;
use Gubee\SDK\Api\Sales\Order\MarketplaceShipmentInterface;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Api\Sales\Order\ItemInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\TrackingInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\TransportInterface;

/**
 * Model for MarketplaceShipmentApiDTORes
 * @see
 * https://api.gubee.com.br/api/swagger-ui/#/definitions/MarketplaceShipmentApiDTORes
 *
 * @method self setAdditionalInfo(array additionalInfo) Set the additional info
 * property
 * @method array getAdditionalInfo() Get the additional info property
 * @method self setCode(string code) Set the code property
 * @method string getCode() Get the code property
 * @method self setDeliveredDt(DateTimeInterface deliveredDt) Set the delivered dt
 * property
 * @method DateTimeInterface getDeliveredDt() Get the delivered dt property
 * @method self setEstimatedDeliveryDt(DateTimeInterface estimatedDeliveryDt) Set
 * the estimated delivery dt property
 * @method DateTimeInterface getEstimatedDeliveryDt() Get the estimated delivery
 * dt property
 * @method self setInvoiceKey(string invoiceKey) Set the invoice key property
 * @method string getInvoiceKey() Get the invoice key property
 * @method self setItems(array items) Set the items property
 * @method array getItems() Get the items property
 * @method self setTracks(array tracks) Set the tracks property
 * @method array getTracks() Get the tracks property
 * @method self setTransport(TransportInterface transport) Set the transport
 * property
 * @method TransportInterface getTransport() Get the transport property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class MarketplaceShipment extends AbstractModel implements MarketplaceShipmentInterface
{
    /**
     * @var array
     */
    protected array $additionalInfo = null;

    /**
     * @var string
     */
    protected string $code;

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
    protected ?string $invoiceKey = null;

    /**
     * @var array<ItemInterface>
     */
    protected array $items;

    /**
     * @var array<TrackingInterface>
     */
    protected array $tracks;

    /**
     * @var TransportInterface
     */
    protected TransportInterface $transport = null;

    /**
     * Set the additional info property
     *
     * @param array $additionalInfo
     * @return $this
     */
    public function setAdditionalInfo(array $additionalInfo): self
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    /**
     * Get the additional info property
     *
     * @return array
     */
    public function getAdditionalInfo(): array
    {
        return $this->additionalInfo;
    }

    /**
     * Set the code property
     *
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get the code property
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
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
     * Set the invoice key property
     *
     * @param string $invoiceKey
     * @return $this
     */
    public function setInvoiceKey(string $invoiceKey): self
    {
        $this->invoiceKey = $invoiceKey;
        return $this;
    }

    /**
     * Get the invoice key property
     *
     * @return string
     */
    public function getInvoiceKey(): string
    {
        return $this->invoiceKey;
    }

    /**
     * Set the items property
     *
     * @param array<ItemInterface> $items
     * @return $this
     */
    public function setItems(array $items): self
    {
        foreach ($items as $item) {
            if (!$item instanceof ItemInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        ItemInterface::class
                    )
                );
            }
        }
        $this->items = $items;
        return $this;
    }

    /**
     * Get the items property
     *
     * @return array<ItemInterface>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Set the tracks property
     *
     * @param array<TrackingInterface> $tracks
     * @return $this
     */
    public function setTracks(array $tracks): self
    {
        foreach ($tracks as $item) {
            if (!$item instanceof TrackingInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        TrackingInterface::class
                    )
                );
            }
        }
        $this->tracks = $tracks;
        return $this;
    }

    /**
     * Get the tracks property
     *
     * @return array<TrackingInterface>
     */
    public function getTracks(): array
    {
        return $this->tracks;
    }

    /**
     * Set the transport property
     *
     * @param TransportInterface $transport
     * @return $this
     */
    public function setTransport(TransportInterface $transport): self
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Get the transport property
     *
     * @return TransportInterface
     */
    public function getTransport(): TransportInterface
    {
        return $this->transport;
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
        if (!isset($values['code'])) {
            $missingFields[] = 'code';
        }

        if (!isset($values['items'])) {
            $missingFields[] = 'items';
        }

        if (!isset($values['tracks'])) {
            $missingFields[] = 'tracks';
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
