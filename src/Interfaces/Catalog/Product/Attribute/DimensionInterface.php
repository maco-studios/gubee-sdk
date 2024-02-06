<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Catalog\Product\Attribute;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\MeasureInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\WeightInterface;

/**
 * Interface for defining dimensions of a product attribute.
 */
interface DimensionInterface
{
    /**
     * Set the depth of the dimension.
     *
     * @param MeasureInterface $depth The depth of the dimension.
     */
    public function setDepth(MeasureInterface $depth): self;

    /**
     * Get the depth of the dimension.
     *
     * @return MeasureInterface The depth of the dimension.
     */
    public function getDepth(): MeasureInterface;

    /**
     * Set the height of the dimension.
     *
     * @param MeasureInterface $height The height of the dimension.
     */
    public function setHeight(MeasureInterface $height): self;

    /**
     * Get the height of the dimension.
     *
     * @return MeasureInterface The height of the dimension.
     */
    public function getHeight(): MeasureInterface;

    /**
     * Set the width of the dimension.
     *
     * @param MeasureInterface $width The width of the dimension.
     */
    public function setWidth(MeasureInterface $width): self;

    /**
     * Get the width of the dimension.
     *
     * @return MeasureInterface The width of the dimension.
     */
    public function getWidth(): MeasureInterface;

    /**
     * Set the weight of the dimension.
     *
     * @param WeightInterface $weight The weight of the dimension.
     */
    public function setWeight(WeightInterface $weight): self;

    /**
     * Get the weight of the dimension.
     *
     * @return WeightInterface The weight of the dimension.
     */
    public function getWeight(): WeightInterface;
}
