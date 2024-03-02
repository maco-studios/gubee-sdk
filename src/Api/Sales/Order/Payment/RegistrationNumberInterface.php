<?php

namespace Gubee\SDK\Api\Sales\Order\Payment;

use Gubee\SDK\Api\ModelInterface;

interface RegistrationNumberInterface extends ModelInterface
{
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
    /**
     * Set the registration number property
     *
     * @param string $registrationNumber
     * @return $this
     */
    public function setRegistrationNumber(string $registrationNumber): self;
    /**
     * Get the registration number property
     *
     * @return string
     */
    public function getRegistrationNumber(): string;
}
