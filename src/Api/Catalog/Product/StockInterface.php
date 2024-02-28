<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\UnitTimeInterface;

interface StockInterface
{
    /**
     * Set the cross docking time for the product.
     *
     * @param UnitTimeInterface $crossDockingTime The cross docking time.
     */
    public function setCrossDockingTime(UnitTimeInterface $crossDockingTime): self;

    /**
     * Get the cross docking time for the product.
     *
     * @return UnitTimeInterface The cross docking time.
     */
    public function getCrossDockingTime(): UnitTimeInterface;

    /**
     * Set the priority of the product.
     *
     * @param int $priority The priority value.
     */
    public function setPriority(int $priority): self;

    /**
     * Get the priority of the product.
     *
     * @return int The priority value.
     */
    public function getPriority(): int;

    /**
     * Set the quantity of the product.
     *
     * @param int $qty The quantity value.
     */
    public function setQty(int $qty): self;

    /**
     * Get the quantity of the product.
     *
     * @return int The quantity value.
     */
    public function getQty(): int;

    /**
     * Set the warehouse ID for the product.
     *
     * @param string $warehouseId The warehouse ID.
     */
    public function setWarehouseId(string $warehouseId): self;

    /**
     * Get the warehouse ID for the product.
     *
     * @return string The warehouse ID.
     */
    public function getWarehouseId(): string;
}
