<?php

namespace Gubee\SDK\Model\Sales\Order;

use DateTimeInterface;
use Gubee\SDK\Api\Sales\Order\PaymentInterface;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Api\Sales\Order\Payment\PaymentMethodInterface;
use Gubee\SDK\Api\Sales\Order\Payment\CreditCardNetworkInterface;
use Gubee\SDK\Api\Sales\Order\Payment\RegistrationNumberInterface;

/**
 * Model for PaymentApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/PaymentApiDTORes
 *
 * @method self setAcquirer(RegistrationNumberInterface acquirer) Set the acquirer
 * property
 * @method RegistrationNumberInterface getAcquirer() Get the acquirer property
 * @method self setCreditCardNetwork(CreditCardNetworkInterface creditCardNetwork)
 * Set the credit card network property
 * @method CreditCardNetworkInterface getCreditCardNetwork() Get the credit card
 * network property
 * @method self setDescription(string description) Set the description property
 * @method string getDescription() Get the description property
 * @method self setIntermediary(RegistrationNumberInterface intermediary) Set the
 * intermediary property
 * @method RegistrationNumberInterface getIntermediary() Get the intermediary
 * property
 * @method self setMethod(string method) Set the method property
 * @method string getMethod() Get the method property
 * @method self setParcels(int parcels) Set the parcels property
 * @method int getParcels() Get the parcels property
 * @method self setPaymentDt(DateTimeInterface paymentDt) Set the payment dt
 * property
 * @method DateTimeInterface getPaymentDt() Get the payment dt property
 * @method self setPaymentMethod(PaymentMethodInterface paymentMethod) Set the
 * payment method property
 * @method PaymentMethodInterface getPaymentMethod() Get the payment method
 * property
 * @method self setValue(float value) Set the value property
 * @method float getValue() Get the value property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Payment extends AbstractModel implements PaymentInterface
{
    /**
     * @var RegistrationNumberInterface
     */
    protected RegistrationNumberInterface $acquirer = null;

    /**
     * @var CreditCardNetworkInterface
     */
    protected CreditCardNetworkInterface $creditCardNetwork = null;

    /**
     * @var string
     */
    protected ?string $description = null;

    /**
     * @var RegistrationNumberInterface
     */
    protected RegistrationNumberInterface $intermediary = null;

    /**
     * @var string
     */
    protected ?string $method = null;

    /**
     * @var int
     */
    protected ?int $parcels = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $paymentDt = null;

    /**
     * @var PaymentMethodInterface
     */
    protected PaymentMethodInterface $paymentMethod = null;

    /**
     * @var float
     */
    protected ?float $value = null;

    /**
     * Set the acquirer property
     *
     * @param RegistrationNumberInterface $acquirer
     * @return $this
     */
    public function setAcquirer(RegistrationNumberInterface $acquirer): self
    {
        $this->acquirer = $acquirer;
        return $this;
    }

    /**
     * Get the acquirer property
     *
     * @return RegistrationNumberInterface
     */
    public function getAcquirer(): RegistrationNumberInterface
    {
        return $this->acquirer;
    }

    /**
     * Set the credit card network property
     *
     * @param CreditCardNetworkInterface $creditCardNetwork
     * @return $this
     */
    public function setCreditCardNetwork(CreditCardNetworkInterface $creditCardNetwork): self
    {
        $this->creditCardNetwork = $creditCardNetwork;
        return $this;
    }

    /**
     * Get the credit card network property
     *
     * @return CreditCardNetworkInterface
     */
    public function getCreditCardNetwork(): CreditCardNetworkInterface
    {
        return $this->creditCardNetwork;
    }

    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the intermediary property
     *
     * @param RegistrationNumberInterface $intermediary
     * @return $this
     */
    public function setIntermediary(RegistrationNumberInterface $intermediary): self
    {
        $this->intermediary = $intermediary;
        return $this;
    }

    /**
     * Get the intermediary property
     *
     * @return RegistrationNumberInterface
     */
    public function getIntermediary(): RegistrationNumberInterface
    {
        return $this->intermediary;
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
     * Set the parcels property
     *
     * @param int $parcels
     * @return $this
     */
    public function setParcels(int $parcels): self
    {
        $this->parcels = $parcels;
        return $this;
    }

    /**
     * Get the parcels property
     *
     * @return int
     */
    public function getParcels(): int
    {
        return $this->parcels;
    }

    /**
     * Set the payment dt property
     *
     * @param DateTimeInterface $paymentDt
     * @return $this
     */
    public function setPaymentDt(DateTimeInterface $paymentDt): self
    {
        $this->paymentDt = $paymentDt;
        return $this;
    }

    /**
     * Get the payment dt property
     *
     * @return DateTimeInterface
     */
    public function getPaymentDt(): DateTimeInterface
    {
        return $this->paymentDt;
    }

    /**
     * Set the payment method property
     *
     * @param PaymentMethodInterface $paymentMethod
     * @return $this
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * Get the payment method property
     *
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod(): PaymentMethodInterface
    {
        return $this->paymentMethod;
    }

    /**
     * Set the value property
     *
     * @param float $value
     * @return $this
     */
    public function setValue(float $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the value property
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
