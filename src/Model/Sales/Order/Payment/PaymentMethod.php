<?php

namespace Gubee\SDK\Model\Sales\Order\Payment;

use Gubee\SDK\Api\Sales\Order\Payment\PaymentMethodInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for PaymentMethodApiDTORes
 * @see
 * https://api.gubee.com.br/api/swagger-ui/#/definitions/PaymentMethodApiDTORes
 *
 * @method self setCode(string code) Set the code property
 * @method string getCode() Get the code property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method array jsonSerialize() Serialize the model to an array
 */
class PaymentMethod extends AbstractModel implements PaymentMethodInterface
{
    /**
     * @var string
     */
    protected ?string $code = null;

    /**
     * @var string
     */
    protected ?string $name = null;

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
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
