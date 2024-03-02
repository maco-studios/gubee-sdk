<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;

interface OriginCountryInterface extends ModelInterface
{
    /**
     * Set the alpha2 code property
     *
     * @param string $alpha2Code
     * @return $this
     */
    public function setAlpha2Code(string $alpha2Code): self;
    /**
     * Get the alpha2 code property
     *
     * @return string
     */
    public function getAlpha2Code(): string;
    /**
     * Set the alpha3 code property
     *
     * @param string $alpha3Code
     * @return $this
     */
    public function setAlpha3Code(string $alpha3Code): self;
    /**
     * Get the alpha3 code property
     *
     * @return string
     */
    public function getAlpha3Code(): string;
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
