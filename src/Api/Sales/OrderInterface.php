<?php

namespace Gubee\SDK\Api\Sales;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Sales\Order\OrderCustomerInterface;
use Gubee\SDK\Api\Sales\Order\ItemInterface;
use Gubee\SDK\Api\Sales\Order\PaymentInterface;
use Gubee\SDK\Api\Sales\Order\ShipmentInterface;
use Gubee\SDK\Api\Sales\Order\OrderStatusInterface;
use Gubee\SDK\Api\Sales\Order\AddressInterface;
use Gubee\SDK\Api\Sales\Order\MarketplaceShipmentInterface;
use Gubee\SDK\Api\Sales\Order\Shipment\LogisticTypeInterface;

interface OrderInterface extends ModelInterface
{
    public const ECONOMIC = 'ECONOMIC';

    public const EXPRESS = 'EXPRESS';

    public const MARKETPLACE = 'MARKETPLACE';

    public const NORMAL = 'NORMAL';

    public const SCHEDULED_DELIVERY = 'SCHEDULED_DELIVERY';

    public const FREIGHTTYPE_LIST = [self::ECONOMIC, self::EXPRESS, self::MARKETPLACE, self::NORMAL, self::SCHEDULED_DELIVERY];

    public const EXCHANGE = 'EXCHANGE';

    public const PICKUP = 'PICKUP';

    public const SALE = 'SALE';

    public const SHIPSTORE = 'SHIPSTORE';

    public const ORDERTYPE_LIST = [self::EXCHANGE, self::PICKUP, self::SALE, self::SHIPSTORE];

    /**
     * Set the account id property
     *
     * @param string $accountId
     * @return $this
     */
    public function setAccountId(string $accountId): self;
    /**
     * Get the account id property
     *
     * @return string
     */
    public function getAccountId(): string;
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
     * Set the billing address property
     *
     * @param AddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress(AddressInterface $billingAddress): self;
    /**
     * Get the billing address property
     *
     * @return AddressInterface
     */
    public function getBillingAddress(): AddressInterface;
    /**
     * Set the channel property
     *
     * @param string $channel
     * @return $this
     */
    public function setChannel(string $channel): self;
    /**
     * Get the channel property
     *
     * @return string
     */
    public function getChannel(): string;
    /**
     * Set the created dt property
     *
     * @param DateTimeInterface $createdDt
     * @return $this
     */
    public function setCreatedDt(DateTimeInterface $createdDt): self;
    /**
     * Get the created dt property
     *
     * @return DateTimeInterface
     */
    public function getCreatedDt(): DateTimeInterface;
    /**
     * Set the customer property
     *
     * @param OrderCustomerInterface $customer
     * @return $this
     */
    public function setCustomer(OrderCustomerInterface $customer): self;
    /**
     * Get the customer property
     *
     * @return OrderCustomerInterface
     */
    public function getCustomer(): OrderCustomerInterface;
    /**
     * Set the display id property
     *
     * @param string $displayId
     * @return $this
     */
    public function setDisplayId(string $displayId): self;
    /**
     * Get the display id property
     *
     * @return string
     */
    public function getDisplayId(): string;
    /**
     * Set the external id property
     *
     * @param string $externalId
     * @return $this
     */
    public function setExternalId(string $externalId): self;
    /**
     * Get the external id property
     *
     * @return string
     */
    public function getExternalId(): string;
    /**
     * Set the freight type property
     *
     * @param string $freightType
     * @return $this
     */
    public function setFreightType(string $freightType): self;
    /**
     * Get the freight type property
     *
     * @return string
     */
    public function getFreightType(): string;
    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the invoices property
     *
     * @param array<InvoiceInterface> $invoices
     * @return $this
     */
    public function setInvoices(array $invoices): self;
    /**
     * Get the invoices property
     *
     * @return array<InvoiceInterface>
     */
    public function getInvoices(): array;
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
     * Set the last modified dt property
     *
     * @param DateTimeInterface $lastModifiedDt
     * @return $this
     */
    public function setLastModifiedDt(DateTimeInterface $lastModifiedDt): self;
    /**
     * Get the last modified dt property
     *
     * @return DateTimeInterface
     */
    public function getLastModifiedDt(): DateTimeInterface;
    /**
     * Set the logistic type property
     *
     * @param LogisticTypeInterface $logisticType
     * @return $this
     */
    public function setLogisticType(LogisticTypeInterface $logisticType): self;
    /**
     * Get the logistic type property
     *
     * @return LogisticTypeInterface
     */
    public function getLogisticType(): LogisticTypeInterface;
    /**
     * Set the marketplace estimated delivery dt property
     *
     * @param DateTimeInterface $marketplaceEstimatedDeliveryDt
     * @return $this
     */
    public function setMarketplaceEstimatedDeliveryDt(DateTimeInterface $marketplaceEstimatedDeliveryDt): self;
    /**
     * Get the marketplace estimated delivery dt property
     *
     * @return DateTimeInterface
     */
    public function getMarketplaceEstimatedDeliveryDt(): DateTimeInterface;
    /**
     * Set the marketplace shipments property
     *
     * @param array<MarketplaceShipmentInterface> $marketplaceShipments
     * @return $this
     */
    public function setMarketplaceShipments(array $marketplaceShipments): self;
    /**
     * Get the marketplace shipments property
     *
     * @return array<MarketplaceShipmentInterface>
     */
    public function getMarketplaceShipments(): array;
    /**
     * Set the order type property
     *
     * @param string $orderType
     * @return $this
     */
    public function setOrderType(string $orderType): self;
    /**
     * Get the order type property
     *
     * @return string
     */
    public function getOrderType(): string;
    /**
     * Set the payments property
     *
     * @param array<PaymentInterface> $payments
     * @return $this
     */
    public function setPayments(array $payments): self;
    /**
     * Get the payments property
     *
     * @return array<PaymentInterface>
     */
    public function getPayments(): array;
    /**
     * Set the plataform property
     *
     * @param string $plataform
     * @return $this
     */
    public function setPlataform(string $plataform): self;
    /**
     * Get the plataform property
     *
     * @return string
     */
    public function getPlataform(): string;
    /**
     * Set the seller id property
     *
     * @param string $sellerId
     * @return $this
     */
    public function setSellerId(string $sellerId): self;
    /**
     * Get the seller id property
     *
     * @return string
     */
    public function getSellerId(): string;
    /**
     * Set the shipments property
     *
     * @param array<ShipmentInterface> $shipments
     * @return $this
     */
    public function setShipments(array $shipments): self;
    /**
     * Get the shipments property
     *
     * @return array<ShipmentInterface>
     */
    public function getShipments(): array;
    /**
     * Set the shipping address property
     *
     * @param AddressInterface $shippingAddress
     * @return $this
     */
    public function setShippingAddress(AddressInterface $shippingAddress): self;
    /**
     * Get the shipping address property
     *
     * @return AddressInterface
     */
    public function getShippingAddress(): AddressInterface;
    /**
     * Set the shipping cost property
     *
     * @param float $shippingCost
     * @return $this
     */
    public function setShippingCost(float $shippingCost): self;
    /**
     * Get the shipping cost property
     *
     * @return float
     */
    public function getShippingCost(): float;
    /**
     * Set the shipping method property
     *
     * @param string $shippingMethod
     * @return $this
     */
    public function setShippingMethod(string $shippingMethod): self;
    /**
     * Get the shipping method property
     *
     * @return string
     */
    public function getShippingMethod(): string;
    /**
     * Set the status property
     *
     * @param OrderStatusInterface $status
     * @return $this
     */
    public function setStatus(OrderStatusInterface $status): self;
    /**
     * Get the status property
     *
     * @return OrderStatusInterface
     */
    public function getStatus(): OrderStatusInterface;
    /**
     * Set the status history property
     *
     * @param array<OrderStatusInterface> $statusHistory
     * @return $this
     */
    public function setStatusHistory(array $statusHistory): self;
    /**
     * Get the status history property
     *
     * @return array<OrderStatusInterface>
     */
    public function getStatusHistory(): array;
    /**
     * Set the total commission property
     *
     * @param float $totalCommission
     * @return $this
     */
    public function setTotalCommission(float $totalCommission): self;
    /**
     * Get the total commission property
     *
     * @return float
     */
    public function getTotalCommission(): float;
    /**
     * Set the total discount property
     *
     * @param float $totalDiscount
     * @return $this
     */
    public function setTotalDiscount(float $totalDiscount): self;
    /**
     * Get the total discount property
     *
     * @return float
     */
    public function getTotalDiscount(): float;
    /**
     * Set the total freight property
     *
     * @param float $totalFreight
     * @return $this
     */
    public function setTotalFreight(float $totalFreight): self;
    /**
     * Get the total freight property
     *
     * @return float
     */
    public function getTotalFreight(): float;
    /**
     * Set the total gross property
     *
     * @param float $totalGross
     * @return $this
     */
    public function setTotalGross(float $totalGross): self;
    /**
     * Get the total gross property
     *
     * @return float
     */
    public function getTotalGross(): float;
    /**
     * Set the total interest property
     *
     * @param float $totalInterest
     * @return $this
     */
    public function setTotalInterest(float $totalInterest): self;
    /**
     * Get the total interest property
     *
     * @return float
     */
    public function getTotalInterest(): float;
    /**
     * Set the total net property
     *
     * @param float $totalNet
     * @return $this
     */
    public function setTotalNet(float $totalNet): self;
    /**
     * Get the total net property
     *
     * @return float
     */
    public function getTotalNet(): float;
    /**
     * Set the total quantity property
     *
     * @param int $totalQuantity
     * @return $this
     */
    public function setTotalQuantity(int $totalQuantity): self;
    /**
     * Get the total quantity property
     *
     * @return int
     */
    public function getTotalQuantity(): int;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
