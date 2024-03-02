<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Api\Catalog\Product\Attribute\DimensionInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\WeightInterface;
use Gubee\SDK\Api\Catalog\Product\Attribute\Dimension\MeasureInterface;

/**
 * Model for DimensionRes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/DimensionRes
 *
 * @method self setDepth(MeasureInterface depth) Set the depth property
 * @method MeasureInterface getDepth() Get the depth property
 * @method self setHeight(MeasureInterface height) Set the height property
 * @method MeasureInterface getHeight() Get the height property
 * @method self setWeight(WeightInterface weight) Set the weight property
 * @method WeightInterface getWeight() Get the weight property
 * @method self setWidth(MeasureInterface width) Set the width property
 * @method MeasureInterface getWidth() Get the width property
 * @method array jsonSerialize() Serialize the model to an array
 */
class Dimension extends AbstractModel implements DimensionInterface
{
    /**
     * @var MeasureInterface
     */
    protected ?MeasureInterface $depth = null;

    /**
     * @var MeasureInterface
     */
    protected ?MeasureInterface $height = null;

    /**
     * @var WeightInterface
     */
    protected ?WeightInterface $weight = null;

    /**
     * @var MeasureInterface
     */
    protected ?MeasureInterface $width = null;

    /**
     * Set the depth property
     *
     * @param MeasureInterface $depth
     * @return $this
     */
    public function setDepth(MeasureInterface $depth): self
    {
        $this->depth = $depth;
        return $this;
    }

    /**
     * Get the depth property
     *
     * @return MeasureInterface
     */
    public function getDepth(): MeasureInterface
    {
        return $this->depth;
    }

    /**
     * Set the height property
     *
     * @param MeasureInterface $height
     * @return $this
     */
    public function setHeight(MeasureInterface $height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get the height property
     *
     * @return MeasureInterface
     */
    public function getHeight(): MeasureInterface
    {
        return $this->height;
    }

    /**
     * Set the weight property
     *
     * @param WeightInterface $weight
     * @return $this
     */
    public function setWeight(WeightInterface $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Get the weight property
     *
     * @return WeightInterface
     */
    public function getWeight(): WeightInterface
    {
        return $this->weight;
    }

    /**
     * Set the width property
     *
     * @param MeasureInterface $width
     * @return $this
     */
    public function setWidth(MeasureInterface $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Get the width property
     *
     * @return MeasureInterface
     */
    public function getWidth(): MeasureInterface
    {
        return $this->width;
    }
}
