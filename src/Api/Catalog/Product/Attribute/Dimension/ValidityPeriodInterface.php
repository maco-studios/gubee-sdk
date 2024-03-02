<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Api\ModelInterface;
use DateTimeInterface;

interface ValidityPeriodInterface extends ModelInterface
{
    /**
     * Set the begin dt property
     *
     * @param DateTimeInterface $beginDt
     * @return $this
     */
    public function setBeginDt(DateTimeInterface $beginDt): self;
    /**
     * Get the begin dt property
     *
     * @return DateTimeInterface
     */
    public function getBeginDt(): DateTimeInterface;
    /**
     * Set the end dt property
     *
     * @param DateTimeInterface $endDt
     * @return $this
     */
    public function setEndDt(DateTimeInterface $endDt): self;
    /**
     * Get the end dt property
     *
     * @return DateTimeInterface
     */
    public function getEndDt(): DateTimeInterface;
    /**
     * Set the valid property
     *
     * @param bool $valid
     * @return $this
     */
    public function setValid(bool $valid): self;
    /**
     * Get the valid property
     *
     * @return bool
     */
    public function getValid(): bool;
}
