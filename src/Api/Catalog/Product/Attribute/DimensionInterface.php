<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;

interface DimensionInterface extends ModelInterface
{
    /**
     * Set the depth property
     *
     * @param MeasureInterface $depth
     * @return $this
     */
    public function setDepth(MeasureInterface $depth): self;
    /**
     * Get the depth property
     *
     * @return MeasureInterface
     */
    public function getDepth(): MeasureInterface;
    /**
     * Set the height property
     *
     * @param MeasureInterface $height
     * @return $this
     */
    public function setHeight(MeasureInterface $height): self;
    /**
     * Get the height property
     *
     * @return MeasureInterface
     */
    public function getHeight(): MeasureInterface;
    /**
     * Set the weight property
     *
     * @param WeightInterface $weight
     * @return $this
     */
    public function setWeight(WeightInterface $weight): self;
    /**
     * Get the weight property
     *
     * @return WeightInterface
     */
    public function getWeight(): WeightInterface;
    /**
     * Set the width property
     *
     * @param MeasureInterface $width
     * @return $this
     */
    public function setWidth(MeasureInterface $width): self;
    /**
     * Get the width property
     *
     * @return MeasureInterface
     */
    public function getWidth(): MeasureInterface;
}
