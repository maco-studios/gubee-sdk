<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute\Dimension;

use DateTimeInterface;

interface ValidityPeriodInterface
{
    /**
     * Set the beginning date and time of the validity period.
     *
     * @param DateTimeInterface $beginDt The beginning date and time
     */
    public function setBeginDt(DateTimeInterface $beginDt): self;

    /**
     * Get the beginning date and time of the validity period.
     *
     * @return DateTimeInterface The beginning date and time
     */
    public function getBeginDt(): DateTimeInterface;

    /**
     * Set the ending date and time of the validity period.
     *
     * @param DateTimeInterface $endDt The ending date and time
     */
    public function setEndDt(DateTimeInterface $endDt): self;

    /**
     * Get the ending date and time of the validity period.
     *
     * @return DateTimeInterface The ending date and time
     */
    public function getEndDt(): DateTimeInterface;
}
