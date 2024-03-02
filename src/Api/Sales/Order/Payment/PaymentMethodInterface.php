<?php

namespace Gubee\SDK\Api\Sales\Order\Payment;

use Gubee\SDK\Api\ModelInterface;

interface PaymentMethodInterface extends ModelInterface
{
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
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;
    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string;
}
