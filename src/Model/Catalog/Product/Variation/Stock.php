<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Variation;

use Gubee\SDK\Api\ServiceProviderInterface;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Model\Catalog\Product\Attribute\Dimension\UnitTime;
use Gubee\SDK\Resource\Catalog\Product\Variation\StockResource;

class Stock extends AbstractModel
{
    protected UnitTime $crossDockingTime;
    protected int $priority = 0;
    protected int $qty = 0;
    protected ?string $warehouseId = null;

    protected StockResource $stockResource;

    /**
     * @param array|UnitTime $crossDockingTime
     */
    public function __construct(
        ServiceProviderInterface $serviceProvider,
        $crossDockingTime,
        int $priority = 0,
        int $qty = 0,
        string $warehouseId = null
    )
    {
        if (is_array($crossDockingTime)) {
            $crossDockingTime = $serviceProvider->create(
                UnitTime::class,
                $crossDockingTime
            );
        }
        $this->setCrossDockingTime($crossDockingTime);
        $this->setPriority($priority);
        $this->setQty($qty);
        if ($warehouseId) {
            $this->setWarehouseId($warehouseId);
        }
    }

    public function save(string $productId, string $skuId): self
    {
        return $this->stockResource->updateStock(
            $productId,
            $skuId,
            $this
        );
    }

    /**
     * @return UnitTime
     */
    public function getCrossDockingTime(): UnitTime
    {
        return $this->crossDockingTime;
    }

    /**
     * @param UnitTime $crossDockingTime 
     * @return self
     */
    public function setCrossDockingTime(UnitTime $crossDockingTime): self
    {
        $this->crossDockingTime = $crossDockingTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority 
     * @return self
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @param int $qty 
     * @return self
     */
    public function setQty(int $qty): self
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * @return string
     */
    public function getWarehouseId(): string
    {
        return $this->warehouseId;
    }

    /**
     * @param string $warehouseId 
     * @return self
     */
    public function setWarehouseId(string $warehouseId): self
    {
        $this->warehouseId = $warehouseId;
        return $this;
    }

    public function jsonSerialize(): array
    {
        $values = parent::jsonSerialize();
        if (isset($values['stockResource'])) {
            unset($values['stockResource']);
        }

        return $values;
    }
}