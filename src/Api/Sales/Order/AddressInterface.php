<?php

namespace Gubee\SDK\Api\Sales\Order;

use Gubee\SDK\Api\ModelInterface;

interface AddressInterface extends ModelInterface
{
    /**
     * Set the city property
     *
     * @param string $city
     * @return $this
     */
    public function setCity(string $city): self;
    /**
     * Get the city property
     *
     * @return string
     */
    public function getCity(): string;
    /**
     * Set the complement property
     *
     * @param string $complement
     * @return $this
     */
    public function setComplement(string $complement): self;
    /**
     * Get the complement property
     *
     * @return string
     */
    public function getComplement(): string;
    /**
     * Set the country property
     *
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country): self;
    /**
     * Get the country property
     *
     * @return string
     */
    public function getCountry(): string;
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
     * Set the neighborhood property
     *
     * @param string $neighborhood
     * @return $this
     */
    public function setNeighborhood(string $neighborhood): self;
    /**
     * Get the neighborhood property
     *
     * @return string
     */
    public function getNeighborhood(): string;
    /**
     * Set the number property
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self;
    /**
     * Get the number property
     *
     * @return string
     */
    public function getNumber(): string;
    /**
     * Set the post code property
     *
     * @param string $postCode
     * @return $this
     */
    public function setPostCode(string $postCode): self;
    /**
     * Get the post code property
     *
     * @return string
     */
    public function getPostCode(): string;
    /**
     * Set the reference property
     *
     * @param string $reference
     * @return $this
     */
    public function setReference(string $reference): self;
    /**
     * Get the reference property
     *
     * @return string
     */
    public function getReference(): string;
    /**
     * Set the region property
     *
     * @param string $region
     * @return $this
     */
    public function setRegion(string $region): self;
    /**
     * Get the region property
     *
     * @return string
     */
    public function getRegion(): string;
    /**
     * Set the street property
     *
     * @param string $street
     * @return $this
     */
    public function setStreet(string $street): self;
    /**
     * Get the street property
     *
     * @return string
     */
    public function getStreet(): string;
}
