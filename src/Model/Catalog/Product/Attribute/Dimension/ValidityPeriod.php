<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use DateTimeInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\ValidityPeriodInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for ValidityPeriodRes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/ValidityPeriodRes
 *
 * @method self setBeginDt(DateTimeInterface beginDt) Set the begin dt property
 * @method DateTimeInterface getBeginDt() Get the begin dt property
 * @method self setEndDt(DateTimeInterface endDt) Set the end dt property
 * @method DateTimeInterface getEndDt() Get the end dt property
 * @method self setValid(bool valid) Set the valid property
 * @method bool getValid() Get the valid property
 * @method array jsonSerialize() Serialize the model to an array
 */
class ValidityPeriod extends AbstractModel implements ValidityPeriodInterface
{
    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $beginDt = null;

    /**
     * @var DateTimeInterface
     */
    protected ?DateTimeInterface $endDt = null;

    /**
     * @var bool
     */
    protected ?bool $valid = null;

    /**
     * Set the begin dt property
     *
     * @param DateTimeInterface $beginDt
     * @return $this
     */
    public function setBeginDt(DateTimeInterface $beginDt): self
    {
        $this->beginDt = $beginDt;
        return $this;
    }

    /**
     * Get the begin dt property
     *
     * @return DateTimeInterface
     */
    public function getBeginDt(): DateTimeInterface
    {
        return $this->beginDt;
    }

    /**
     * Set the end dt property
     *
     * @param DateTimeInterface $endDt
     * @return $this
     */
    public function setEndDt(DateTimeInterface $endDt): self
    {
        $this->endDt = $endDt;
        return $this;
    }

    /**
     * Get the end dt property
     *
     * @return DateTimeInterface
     */
    public function getEndDt(): DateTimeInterface
    {
        return $this->endDt;
    }

    /**
     * Set the valid property
     *
     * @param bool $valid
     * @return $this
     */
    public function setValid(bool $valid): self
    {
        $this->valid = $valid;
        return $this;
    }

    /**
     * Get the valid property
     *
     * @return bool
     */
    public function getValid(): bool
    {
        return $this->valid;
    }
}
