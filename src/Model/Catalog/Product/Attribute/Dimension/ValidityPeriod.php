<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use DateTime;
use DateTimeInterface;
use Gubee\SDK\Model\AbstractModel;

class ValidityPeriod extends AbstractModel
{
    protected DateTimeInterface $beginDt;
    protected DateTimeInterface $endDt;

    /**
     * @param string|DateTimeInterface $beginDt
     * @param string|DateTimeInterface $endDt
     */
    public function __construct(
        $beginDt,
        $endDt
    )
    {
        if (is_string($beginDt)) {
            $beginDt = DateTime::createFromFormat(
                'Y-m-d\TH:i:s.v',
                $beginDt
            );
        }
        $this->setBeginDt($beginDt);
        if (is_string($endDt)) {
            $endDt = DateTime::createFromFormat(
                'Y-m-d\TH:i:s.v',
                $endDt
            );
        }
        $this->setEndDt($endDt);
    }

    /**
     * @return DateTimeInterface
     */
    public function getBeginDt(): DateTimeInterface
    {
        return $this->beginDt;
    }

    /**
     * @param DateTimeInterface $beginDt 
     * @return self
     */
    public function setBeginDt(DateTimeInterface $beginDt): self
    {
        $this->beginDt = $beginDt;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEndDt(): DateTimeInterface
    {
        return $this->endDt;
    }

    /**
     * @param DateTimeInterface $endDt 
     * @return self
     */
    public function setEndDt(DateTimeInterface $endDt): self
    {
        $this->endDt = $endDt;
        return $this;
    }
}