<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\MeasureInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\WeightInterface;
use Gubee\SDK\Interfaces\Catalog\Product\Attribute\DimensionInterface;
use Gubee\SDK\Model\AbstractModel;

class Dimension extends AbstractModel implements DimensionInterface
{
    protected MeasureInterface $depth;
    protected MeasureInterface $height;
    protected MeasureInterface $width;
    protected WeightInterface $weight;

    /**
     * Set the depth of the dimension.
     *
     * @param MeasureInterface $depth The depth of the dimension.
     */
    public function setDepth(MeasureInterface $depth): self
    {
        $this->depth = $depth;
        return $this;
    }

    /**
     * Get the depth of the dimension.
     *
     * @return MeasureInterface The depth of the dimension.
     */
    public function getDepth(): MeasureInterface
    {
        return $this->depth;
    }

    /**
     * Set the height of the dimension.
     *
     * @param MeasureInterface $height The height of the dimension.
     */
    public function setHeight(MeasureInterface $height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get the height of the dimension.
     *
     * @return MeasureInterface The height of the dimension.
     */
    public function getHeight(): MeasureInterface
    {
        return $this->height;
    }

    /**
     * Set the width of the dimension.
     *
     * @param MeasureInterface $width The width of the dimension.
     */
    public function setWidth(MeasureInterface $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Get the width of the dimension.
     *
     * @return MeasureInterface The width of the dimension.
     */
    public function getWidth(): MeasureInterface
    {
        return $this->width;
    }

    /**
     * Set the weight of the dimension.
     *
     * @param WeightInterface $weight The weight of the dimension.
     */
    public function setWeight(WeightInterface $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Get the weight of the dimension.
     *
     * @return WeightInterface The weight of the dimension.
     */
    public function getWeight(): WeightInterface
    {
        return $this->weight;
    }
}
