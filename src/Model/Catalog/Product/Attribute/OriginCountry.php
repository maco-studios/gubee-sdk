<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Api\Catalog\Product\Attribute\OriginCountryInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for OriginCountryDTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/OriginCountryDTO
 *
 * @method self setAlpha2Code(string alpha2Code) Set the alpha2 code property
 * @method string getAlpha2Code() Get the alpha2 code property
 * @method self setAlpha3Code(string alpha3Code) Set the alpha3 code property
 * @method string getAlpha3Code() Get the alpha3 code property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method array jsonSerialize() Serialize the model to an array
 */
class OriginCountry extends AbstractModel implements OriginCountryInterface
{
    /**
     * @var string
     */
    protected ?string $alpha2Code = null;

    /**
     * @var string
     */
    protected ?string $alpha3Code = null;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * Set the alpha2 code property
     *
     * @param string $alpha2Code
     * @return $this
     */
    public function setAlpha2Code(string $alpha2Code): self
    {
        $this->alpha2Code = $alpha2Code;
        return $this;
    }

    /**
     * Get the alpha2 code property
     *
     * @return string
     */
    public function getAlpha2Code(): string
    {
        return $this->alpha2Code;
    }

    /**
     * Set the alpha3 code property
     *
     * @param string $alpha3Code
     * @return $this
     */
    public function setAlpha3Code(string $alpha3Code): self
    {
        $this->alpha3Code = $alpha3Code;
        return $this;
    }

    /**
     * Get the alpha3 code property
     *
     * @return string
     */
    public function getAlpha3Code(): string
    {
        return $this->alpha3Code;
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
