<?php

namespace Gubee\SDK\Model;

use DateTimeInterface;
use Gubee\SDK\Api\Sales\Order\PaymentInterface;
use Gubee\SDK\Api\Sales\InvoiceInterface;
use Gubee\SDK\Api\Sales\Order\AddressInterface;
use Gubee\SDK\Api\Sales\Order\ItemInterface;
use Gubee\SDK\Api\Sales\Order\LogisticTypeInterface;
use Gubee\SDK\Api\Sales\Order\MarketplaceShipmentInterface;
use Gubee\SDK\Api\Sales\Order\OrderCustomerInterface;
use Gubee\SDK\Api\Sales\Order\OrderStatusInterface;
use Gubee\SDK\Api\Sales\Order\ShipmentInterface;
use Gubee\SDK\Api\Sales\OrderInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for OrderApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/OrderApiDTORes
 *
 * @method self setAccountId(string accountId) Set the account id property
 * @method string getAccountId() Get the account id property
 * @method self setAdditionalInfo(array additionalInfo) Set the additional info
 * property
 * @method array getAdditionalInfo() Get the additional info property
 * @method self setBillingAddress(AddressInterface billingAddress) Set the billing
 * address property
 * @method AddressInterface getBillingAddress() Get the billing address property
 * @method self setChannel(string channel) Set the channel property
 * @method string getChannel() Get the channel property
 * @method self setCreatedDt(DateTimeInterface createdDt) Set the created dt
 * property
 * @method DateTimeInterface getCreatedDt() Get the created dt property
 * @method self setCustomer(OrderCustomerInterface customer) Set the customer
 * property
 * @method OrderCustomerInterface getCustomer() Get the customer property
 * @method self setDisplayId(string displayId) Set the display id property
 * @method string getDisplayId() Get the display id property
 * @method self setExternalId(string externalId) Set the external id property
 * @method string getExternalId() Get the external id property
 * @method self setFreightType(string freightType) Set the freight type property
 * @method string getFreightType() Get the freight type property
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setInvoices(array invoices) Set the invoices property
 * @method array getInvoices() Get the invoices property
 * @method self setItems(array items) Set the items property
 * @method array getItems() Get the items property
 * @method self setLastModifiedDt(DateTimeInterface lastModifiedDt) Set the last
 * modified dt property
 * @method DateTimeInterface getLastModifiedDt() Get the last modified dt property
 * @method self setLogisticType(LogisticTypeInterface logisticType) Set the
 * logistic type property
 * @method LogisticTypeInterface getLogisticType() Get the logistic type property
 * @method self setMarketplaceEstimatedDeliveryDt(DateTimeInterface
 * marketplaceEstimatedDeliveryDt) Set the marketplace estimated delivery dt
 * property
 * @method DateTimeInterface getMarketplaceEstimatedDeliveryDt() Get the
 * marketplace estimated delivery dt property
 * @method self setMarketplaceShipments(array marketplaceShipments) Set the
 * marketplace shipments property
 * @method array getMarketplaceShipments() Get the marketplace shipments property
 * @method self setOrderType(string orderType) Set the order type property
 * @method string getOrderType() Get the order type property
 * @method self setPayments(array payments) Set the payments property
 * @method array getPayments() Get the payments property
 * @method self setPlataform(string plataform) Set the plataform property
 * @method string getPlataform() Get the plataform property
 * @method self setSellerId(string sellerId) Set the seller id property
 * @method string getSellerId() Get the seller id property
 * @method self setShipments(array shipments) Set the shipments property
 * @method array getShipments() Get the shipments property
 * @method self setShippingAddress(AddressInterface shippingAddress) Set the
 * shipping address property
 * @method AddressInterface getShippingAddress() Get the shipping address property
 * @method self setShippingCost(float shippingCost) Set the shipping cost property
 * @method float getShippingCost() Get the shipping cost property
 * @method self setShippingMethod(string shippingMethod) Set the shipping method
 * property
 * @method string getShippingMethod() Get the shipping method property
 * @method self setStatus(OrderStatusInterface status) Set the status property
 * @method OrderStatusInterface getStatus() Get the status property
 * @method self setStatusHistory(array statusHistory) Set the status history
 * property
 * @method array getStatusHistory() Get the status history property
 * @method self setTotalCommission(float totalCommission) Set the total commission
 * property
 * @method float getTotalCommission() Get the total commission property
 * @method self setTotalDiscount(float totalDiscount) Set the total discount
 * property
 * @method float getTotalDiscount() Get the total discount property
 * @method self setTotalFreight(float totalFreight) Set the total freight property
 * @method float getTotalFreight() Get the total freight property
 * @method self setTotalGross(float totalGross) Set the total gross property
 * @method float getTotalGross() Get the total gross property
 * @method self setTotalInterest(float totalInterest) Set the total interest
 * property
 * @method float getTotalInterest() Get the total interest property
 * @method self setTotalNet(float totalNet) Set the total net property
 * @method float getTotalNet() Get the total net property
 * @method self setTotalQuantity(int totalQuantity) Set the total quantity
 * property
 * @method int getTotalQuantity() Get the total quantity property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Order extends AbstractModel implements OrderInterface
{
    /**
     * @var string
     */
    protected ?string $accountId = null;

    /**
     * @var array
     */
    protected array $additionalInfo = null;

    /**
     * @var AddressInterface
     */
    protected ?AddressInterface $billingAddress = null;

    /**
     * @var string
     */
    protected string $channel;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $createdDt = null;

    /**
     * @var OrderCustomerInterface
     */
    protected ?OrderCustomerInterface $customer = null;

    /**
     * @var string
     */
    protected ?string $displayId = null;

    /**
     * @var string
     */
    protected string $externalId;

    /**
     * @var string
     */
    protected string $freightType;

    /**
     * @var string
     */
    protected string $id;

    /**
     * @var array<InvoiceInterface>
     */
    protected array $invoices;

    /**
     * @var array<ItemInterface>
     */
    protected array $items;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $lastModifiedDt = null;

    /**
     * @var LogisticTypeInterface
     */
    protected ?LogisticTypeInterface $logisticType = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $marketplaceEstimatedDeliveryDt = null;

    /**
     * @var array<MarketplaceShipmentInterface>
     */
    protected array $marketplaceShipments = null;

    /**
     * @var string
     */
    protected string $orderType;

    /**
     * @var array<PaymentInterface>
     */
    protected array $payments;

    /**
     * @var string
     */
    protected ?string $plataform = null;

    /**
     * @var string
     */
    protected ?string $sellerId = null;

    /**
     * @var array<ShipmentInterface>
     */
    protected array $shipments;

    /**
     * @var AddressInterface
     */
    protected AddressInterface $shippingAddress = null;

    /**
     * @var float
     */
    protected ?float $shippingCost = null;

    /**
     * @var string
     */
    protected ?string $shippingMethod = null;

    /**
     * @var OrderStatusInterface
     */
    protected OrderStatusInterface $status = null;

    /**
     * @var array<OrderStatusInterface>
     */
    protected array $statusHistory;

    /**
     * @var float
     */
    protected ?float $totalCommission = null;

    /**
     * @var float
     */
    protected ?float $totalDiscount = null;

    /**
     * @var float
     */
    protected ?float $totalFreight = null;

    /**
     * @var float
     */
    protected ?float $totalGross = null;

    /**
     * @var float
     */
    protected ?float $totalInterest = null;

    /**
     * @var float
     */
    protected ?float $totalNet = null;

    /**
     * @var int
     */
    protected ?int $totalQuantity = null;

    /**
     * Set the account id property
     *
     * @param string $accountId
     * @return $this
     */
    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * Get the account id property
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

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
     * Set the billing address property
     *
     * @param AddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress(AddressInterface $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * Get the billing address property
     *
     * @return AddressInterface
     */
    public function getBillingAddress(): AddressInterface
    {
        return $this->billingAddress;
    }

    /**
     * Set the channel property
     *
     * @param string $channel
     * @return $this
     */
    public function setChannel(string $channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * Get the channel property
     *
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * Set the created dt property
     *
     * @param DateTimeInterface $createdDt
     * @return $this
     */
    public function setCreatedDt(DateTimeInterface $createdDt): self
    {
        $this->createdDt = $createdDt;
        return $this;
    }

    /**
     * Get the created dt property
     *
     * @return DateTimeInterface
     */
    public function getCreatedDt(): DateTimeInterface
    {
        return $this->createdDt;
    }

    /**
     * Set the customer property
     *
     * @param OrderCustomerInterface $customer
     * @return $this
     */
    public function setCustomer(OrderCustomerInterface $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Get the customer property
     *
     * @return OrderCustomerInterface
     */
    public function getCustomer(): OrderCustomerInterface
    {
        return $this->customer;
    }

    /**
     * Set the display id property
     *
     * @param string $displayId
     * @return $this
     */
    public function setDisplayId(string $displayId): self
    {
        $this->displayId = $displayId;
        return $this;
    }

    /**
     * Get the display id property
     *
     * @return string
     */
    public function getDisplayId(): string
    {
        return $this->displayId;
    }

    /**
     * Set the external id property
     *
     * @param string $externalId
     * @return $this
     */
    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * Get the external id property
     *
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * Set the freight type property
     *
     * @param string $freightType
     * @return $this
     */
    public function setFreightType(string $freightType): self
    {
        if (!in_array($freightType, self::FREIGHTTYPE_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::FREIGHTTYPE_LIST)
                )
            );
        }

        $this->freightType = $freightType;
        return $this;
    }

    /**
     * Get the freight type property
     *
     * @return string
     */
    public function getFreightType(): string
    {
        return $this->freightType;
    }

    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the invoices property
     *
     * @param array<InvoiceInterface> $invoices
     * @return $this
     */
    public function setInvoices(array $invoices): self
    {
        foreach ($invoices as $item) {
            if (!$item instanceof InvoiceInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        InvoiceInterface::class
                    )
                );
            }
        }
        $this->invoices = $invoices;
        return $this;
    }

    /**
     * Get the invoices property
     *
     * @return array<InvoiceInterface>
     */
    public function getInvoices(): array
    {
        return $this->invoices;
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
     * Set the last modified dt property
     *
     * @param DateTimeInterface $lastModifiedDt
     * @return $this
     */
    public function setLastModifiedDt(DateTimeInterface $lastModifiedDt): self
    {
        $this->lastModifiedDt = $lastModifiedDt;
        return $this;
    }

    /**
     * Get the last modified dt property
     *
     * @return DateTimeInterface
     */
    public function getLastModifiedDt(): DateTimeInterface
    {
        return $this->lastModifiedDt;
    }

    /**
     * Set the logistic type property
     *
     * @param LogisticTypeInterface $logisticType
     * @return $this
     */
    public function setLogisticType(LogisticTypeInterface $logisticType): self
    {
        $this->logisticType = $logisticType;
        return $this;
    }

    /**
     * Get the logistic type property
     *
     * @return LogisticTypeInterface
     */
    public function getLogisticType(): LogisticTypeInterface
    {
        return $this->logisticType;
    }

    /**
     * Set the marketplace estimated delivery dt property
     *
     * @param DateTimeInterface $marketplaceEstimatedDeliveryDt
     * @return $this
     */
    public function setMarketplaceEstimatedDeliveryDt(DateTimeInterface $marketplaceEstimatedDeliveryDt): self
    {
        $this->marketplaceEstimatedDeliveryDt = $marketplaceEstimatedDeliveryDt;
        return $this;
    }

    /**
     * Get the marketplace estimated delivery dt property
     *
     * @return DateTimeInterface
     */
    public function getMarketplaceEstimatedDeliveryDt(): DateTimeInterface
    {
        return $this->marketplaceEstimatedDeliveryDt;
    }

    /**
     * Set the marketplace shipments property
     *
     * @param array<MarketplaceShipmentInterface> $marketplaceShipments
     * @return $this
     */
    public function setMarketplaceShipments(array $marketplaceShipments): self
    {
        foreach ($marketplaceShipments as $item) {
            if (!$item instanceof MarketplaceShipmentInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        MarketplaceShipmentInterface::class
                    )
                );
            }
        }
        $this->marketplaceShipments = $marketplaceShipments;
        return $this;
    }

    /**
     * Get the marketplace shipments property
     *
     * @return array<MarketplaceShipmentInterface>
     */
    public function getMarketplaceShipments(): array
    {
        return $this->marketplaceShipments;
    }

    /**
     * Set the order type property
     *
     * @param string $orderType
     * @return $this
     */
    public function setOrderType(string $orderType): self
    {
        if (!in_array($orderType, self::ORDERTYPE_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::ORDERTYPE_LIST)
                )
            );
        }

        $this->orderType = $orderType;
        return $this;
    }

    /**
     * Get the order type property
     *
     * @return string
     */
    public function getOrderType(): string
    {
        return $this->orderType;
    }

    /**
     * Set the payments property
     *
     * @param array<PaymentInterface> $payments
     * @return $this
     */
    public function setPayments(array $payments): self
    {
        foreach ($payments as $item) {
            if (!$item instanceof PaymentInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        PaymentInterface::class
                    )
                );
            }
        }
        $this->payments = $payments;
        return $this;
    }

    /**
     * Get the payments property
     *
     * @return array<PaymentInterface>
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * Set the plataform property
     *
     * @param string $plataform
     * @return $this
     */
    public function setPlataform(string $plataform): self
    {
        $this->plataform = $plataform;
        return $this;
    }

    /**
     * Get the plataform property
     *
     * @return string
     */
    public function getPlataform(): string
    {
        return $this->plataform;
    }

    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    /**
     * Set the shipments property
     *
     * @param array<ShipmentInterface> $shipments
     * @return $this
     */
    public function setShipments(array $shipments): self
    {
        foreach ($shipments as $item) {
            if (!$item instanceof ShipmentInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        ShipmentInterface::class
                    )
                );
            }
        }
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * Get the shipments property
     *
     * @return array<ShipmentInterface>
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    /**
     * Set the shipping address property
     *
     * @param AddressInterface $shippingAddress
     * @return $this
     */
    public function setShippingAddress(AddressInterface $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    /**
     * Get the shipping address property
     *
     * @return AddressInterface
     */
    public function getShippingAddress(): AddressInterface
    {
        return $this->shippingAddress;
    }

    /**
     * Set the shipping cost property
     *
     * @param float $shippingCost
     * @return $this
     */
    public function setShippingCost(float $shippingCost): self
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    /**
     * Get the shipping cost property
     *
     * @return float
     */
    public function getShippingCost(): float
    {
        return $this->shippingCost;
    }

    /**
     * Set the shipping method property
     *
     * @param string $shippingMethod
     * @return $this
     */
    public function setShippingMethod(string $shippingMethod): self
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
    }

    /**
     * Get the shipping method property
     *
     * @return string
     */
    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    /**
     * Set the status property
     *
     * @param OrderStatusInterface $status
     * @return $this
     */
    public function setStatus(OrderStatusInterface $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the status property
     *
     * @return OrderStatusInterface
     */
    public function getStatus(): OrderStatusInterface
    {
        return $this->status;
    }

    /**
     * Set the status history property
     *
     * @param array<OrderStatusInterface> $statusHistory
     * @return $this
     */
    public function setStatusHistory(array $statusHistory): self
    {
        foreach ($statusHistory as $item) {
            if (!$item instanceof OrderStatusInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        OrderStatusInterface::class
                    )
                );
            }
        }
        $this->statusHistory = $statusHistory;
        return $this;
    }

    /**
     * Get the status history property
     *
     * @return array<OrderStatusInterface>
     */
    public function getStatusHistory(): array
    {
        return $this->statusHistory;
    }

    /**
     * Set the total commission property
     *
     * @param float $totalCommission
     * @return $this
     */
    public function setTotalCommission(float $totalCommission): self
    {
        $this->totalCommission = $totalCommission;
        return $this;
    }

    /**
     * Get the total commission property
     *
     * @return float
     */
    public function getTotalCommission(): float
    {
        return $this->totalCommission;
    }

    /**
     * Set the total discount property
     *
     * @param float $totalDiscount
     * @return $this
     */
    public function setTotalDiscount(float $totalDiscount): self
    {
        $this->totalDiscount = $totalDiscount;
        return $this;
    }

    /**
     * Get the total discount property
     *
     * @return float
     */
    public function getTotalDiscount(): float
    {
        return $this->totalDiscount;
    }

    /**
     * Set the total freight property
     *
     * @param float $totalFreight
     * @return $this
     */
    public function setTotalFreight(float $totalFreight): self
    {
        $this->totalFreight = $totalFreight;
        return $this;
    }

    /**
     * Get the total freight property
     *
     * @return float
     */
    public function getTotalFreight(): float
    {
        return $this->totalFreight;
    }

    /**
     * Set the total gross property
     *
     * @param float $totalGross
     * @return $this
     */
    public function setTotalGross(float $totalGross): self
    {
        $this->totalGross = $totalGross;
        return $this;
    }

    /**
     * Get the total gross property
     *
     * @return float
     */
    public function getTotalGross(): float
    {
        return $this->totalGross;
    }

    /**
     * Set the total interest property
     *
     * @param float $totalInterest
     * @return $this
     */
    public function setTotalInterest(float $totalInterest): self
    {
        $this->totalInterest = $totalInterest;
        return $this;
    }

    /**
     * Get the total interest property
     *
     * @return float
     */
    public function getTotalInterest(): float
    {
        return $this->totalInterest;
    }

    /**
     * Set the total net property
     *
     * @param float $totalNet
     * @return $this
     */
    public function setTotalNet(float $totalNet): self
    {
        $this->totalNet = $totalNet;
        return $this;
    }

    /**
     * Get the total net property
     *
     * @return float
     */
    public function getTotalNet(): float
    {
        return $this->totalNet;
    }

    /**
     * Set the total quantity property
     *
     * @param int $totalQuantity
     * @return $this
     */
    public function setTotalQuantity(int $totalQuantity): self
    {
        $this->totalQuantity = $totalQuantity;
        return $this;
    }

    /**
     * Get the total quantity property
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        return $this->totalQuantity;
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
        if (!isset($values['channel'])) {
            $missingFields[] = 'channel';
        }

        if (!isset($values['externalId'])) {
            $missingFields[] = 'externalId';
        }

        if (!isset($values['freightType'])) {
            $missingFields[] = 'freightType';
        }

        if (!isset($values['id'])) {
            $missingFields[] = 'id';
        }

        if (!isset($values['invoices'])) {
            $missingFields[] = 'invoices';
        }

        if (!isset($values['items'])) {
            $missingFields[] = 'items';
        }

        if (!isset($values['orderType'])) {
            $missingFields[] = 'orderType';
        }

        if (!isset($values['payments'])) {
            $missingFields[] = 'payments';
        }

        if (!isset($values['shipments'])) {
            $missingFields[] = 'shipments';
        }

        if (!isset($values['statusHistory'])) {
            $missingFields[] = 'statusHistory';
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
