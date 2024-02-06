<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use DateTimeInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\ValidityPeriodInterface;
use Gubee\SDK\Model\AbstractModel;

class ValidityPeriod extends AbstractModel implements ValidityPeriodInterface
{
    protected DateTimeInterface $beginDt;
    protected DateTimeInterface $endDt;

    /**
     * Set the beginning date and time of the validity period.
     *
     * @param DateTimeInterface $beginDt The beginning date and time
     */
    public function setBeginDt(DateTimeInterface $beginDt): self
    {
        $this->beginDt = $beginDt;
        return $this;
    }

    /**
     * Get the beginning date and time of the validity period.
     *
     * @return DateTimeInterface The beginning date and time
     */
    public function getBeginDt(): DateTimeInterface
    {
        return $this->beginDt;
    }

    /**
     * Set the ending date and time of the validity period.
     *
     * @param DateTimeInterface $endDt The ending date and time
     */
    public function setEndDt(DateTimeInterface $endDt): self
    {
        $this->endDt = $endDt;
        return $this;
    }

    /**
     * Get the ending date and time of the validity period.
     *
     * @return DateTimeInterface The ending date and time
     */
    public function getEndDt(): DateTimeInterface
    {
        return $this->endDt;
    }
}
