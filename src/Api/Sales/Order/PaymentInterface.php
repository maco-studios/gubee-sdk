<?php

namespace Gubee\SDK\Api\Sales\Order;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Sales\Order\Payment\CreditCardNetworkInterface;
use Gubee\SDK\Api\Sales\Order\Payment\PaymentMethodInterface;
use Gubee\SDK\Api\Sales\Order\Payment\RegistrationNumberInterface;

interface PaymentInterface extends ModelInterface
{
    /**
     * Set the acquirer property
     *
     * @param RegistrationNumberInterface $acquirer
     * @return $this
     */
    public function setAcquirer(RegistrationNumberInterface $acquirer): self;
    /**
     * Get the acquirer property
     *
     * @return RegistrationNumberInterface
     */
    public function getAcquirer(): RegistrationNumberInterface;
    /**
     * Set the credit card network property
     *
     * @param CreditCardNetworkInterface $creditCardNetwork
     * @return $this
     */
    public function setCreditCardNetwork(CreditCardNetworkInterface $creditCardNetwork): self;
    /**
     * Get the credit card network property
     *
     * @return CreditCardNetworkInterface
     */
    public function getCreditCardNetwork(): CreditCardNetworkInterface;
    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self;
    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string;
    /**
     * Set the intermediary property
     *
     * @param RegistrationNumberInterface $intermediary
     * @return $this
     */
    public function setIntermediary(RegistrationNumberInterface $intermediary): self;
    /**
     * Get the intermediary property
     *
     * @return RegistrationNumberInterface
     */
    public function getIntermediary(): RegistrationNumberInterface;
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
     * Set the parcels property
     *
     * @param int $parcels
     * @return $this
     */
    public function setParcels(int $parcels): self;
    /**
     * Get the parcels property
     *
     * @return int
     */
    public function getParcels(): int;
    /**
     * Set the payment dt property
     *
     * @param DateTimeInterface $paymentDt
     * @return $this
     */
    public function setPaymentDt(DateTimeInterface $paymentDt): self;
    /**
     * Get the payment dt property
     *
     * @return DateTimeInterface
     */
    public function getPaymentDt(): DateTimeInterface;
    /**
     * Set the payment method property
     *
     * @param PaymentMethodInterface $paymentMethod
     * @return $this
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod): self;
    /**
     * Get the payment method property
     *
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod(): PaymentMethodInterface;
    /**
     * Set the value property
     *
     * @param float $value
     * @return $this
     */
    public function setValue(float $value): self;
    /**
     * Get the value property
     *
     * @return float
     */
    public function getValue(): float;
}
