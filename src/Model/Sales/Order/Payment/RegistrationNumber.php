<?php

namespace Gubee\SDK\Model\Sales\Order\Payment;

use Gubee\SDK\Api\Sales\Order\Payment\RegistrationNumberInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for RegistrationNumberApiDTORes
 * @see
 * https://api.gubee.com.br/api/swagger-ui/#/definitions/RegistrationNumberApiDTORes
 *
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setRegistrationNumber(string registrationNumber) Set the
 * registration number property
 * @method string getRegistrationNumber() Get the registration number property
 * @method array jsonSerialize() Serialize the model to an array
 */
class RegistrationNumber extends AbstractModel implements RegistrationNumberInterface
{
    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var string
     */
    protected ?string $registrationNumber = null;

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

    /**
     * Set the registration number property
     *
     * @param string $registrationNumber
     * @return $this
     */
    public function setRegistrationNumber(string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    /**
     * Get the registration number property
     *
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
}
