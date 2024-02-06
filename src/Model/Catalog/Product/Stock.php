<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\UnitTimeInterface;
use Gubee\SDK\Interfaces\Catalog\Product\StockInterface;
use Gubee\SDK\Model\AbstractModel;

class Stock extends AbstractModel implements StockInterface
{
    protected UnitTimeInterface $crossDockingTime;
    protected int $priority;
    protected int $qty;
    protected string $warehouseId;

    /**
     * Set the cross docking time for the product.
     *
     * @param UnitTimeInterface $crossDockingTime The cross docking time.
     */
    public function setCrossDockingTime(UnitTimeInterface $crossDockingTime): self
    {
        $this->crossDockingTime = $crossDockingTime;
        return $this;
    }

    /**
     * Get the cross docking time for the product.
     *
     * @return UnitTimeInterface The cross docking time.
     */
    public function getCrossDockingTime(): UnitTimeInterface
    {
        return $this->crossDockingTime;
    }

    /**
     * Set the priority of the product.
     *
     * @param int $priority The priority value.
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Get the priority of the product.
     *
     * @return int The priority value.
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * Set the quantity of the product.
     *
     * @param int $qty The quantity value.
     */
    public function setQty(int $qty): self
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * Get the quantity of the product.
     *
     * @return int The quantity value.
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * Set the warehouse ID for the product.
     *
     * @param string $warehouseId The warehouse ID.
     */
    public function setWarehouseId(string $warehouseId): self
    {
        $this->warehouseId = $warehouseId;
        return $this;
    }

    /**
     * Get the warehouse ID for the product.
     *
     * @return string The warehouse ID.
     */
    public function getWarehouseId(): string
    {
        return $this->warehouseId;
    }
}
