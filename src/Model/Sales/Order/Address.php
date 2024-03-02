<?php

namespace Gubee\SDK\Model\Sales\Order;

use Gubee\SDK\Api\Sales\Order\AddressInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for AddressApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/AddressApiDTORes
 *
 * @method self setCity(string city) Set the city property
 * @method string getCity() Get the city property
 * @method self setComplement(string complement) Set the complement property
 * @method string getComplement() Get the complement property
 * @method self setCountry(string country) Set the country property
 * @method string getCountry() Get the country property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setNeighborhood(string neighborhood) Set the neighborhood property
 * @method string getNeighborhood() Get the neighborhood property
 * @method self setNumber(string number) Set the number property
 * @method string getNumber() Get the number property
 * @method self setPostCode(string postCode) Set the post code property
 * @method string getPostCode() Get the post code property
 * @method self setReference(string reference) Set the reference property
 * @method string getReference() Get the reference property
 * @method self setRegion(string region) Set the region property
 * @method string getRegion() Get the region property
 * @method self setStreet(string street) Set the street property
 * @method string getStreet() Get the street property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Address extends AbstractModel implements AddressInterface
{
    /**
     * @var string
     */
    protected ?string $city = null;

    /**
     * @var string
     */
    protected ?string $complement = null;

    /**
     * @var string
     */
    protected ?string $country = null;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var string
     */
    protected ?string $neighborhood = null;

    /**
     * @var string
     */
    protected ?string $number = null;

    /**
     * @var string
     */
    protected ?string $postCode = null;

    /**
     * @var string
     */
    protected ?string $reference = null;

    /**
     * @var string
     */
    protected ?string $region = null;

    /**
     * @var string
     */
    protected ?string $street = null;

    /**
     * Set the city property
     *
     * @param string $city
     * @return $this
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get the city property
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the complement property
     *
     * @param string $complement
     * @return $this
     */
    public function setComplement(string $complement): self
    {
        $this->complement = $complement;
        return $this;
    }

    /**
     * Get the complement property
     *
     * @return string
     */
    public function getComplement(): string
    {
        return $this->complement;
    }

    /**
     * Set the country property
     *
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get the country property
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
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

    /**
     * Set the neighborhood property
     *
     * @param string $neighborhood
     * @return $this
     */
    public function setNeighborhood(string $neighborhood): self
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * Get the neighborhood property
     *
     * @return string
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * Set the number property
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get the number property
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Set the post code property
     *
     * @param string $postCode
     * @return $this
     */
    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * Get the post code property
     *
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * Set the reference property
     *
     * @param string $reference
     * @return $this
     */
    public function setReference(string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Get the reference property
     *
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * Set the region property
     *
     * @param string $region
     * @return $this
     */
    public function setRegion(string $region): self
    {
        $this->region = $region;
        return $this;
    }

    /**
     * Get the region property
     *
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Set the street property
     *
     * @param string $street
     * @return $this
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Get the street property
     *
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }
}
