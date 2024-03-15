<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Enum\Catalog\Product\Attribute\Dimension\Measure\TypeEnum;
use Gubee\SDK\Model\AbstractModel;

class Measure extends AbstractModel
{
    protected TypeEnum $type;
    protected float $value;

    /**
     * @param TypeEnum|string $type
     * @param float $value
     */
    public function __construct(
        $type,
        float $value
    )
    {
        if (is_string($type)) {
            $type = TypeEnum::fromValue($type);
        }
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return TypeEnum
     */
    public function getType(): TypeEnum
    {
        return $this->type;
    }

    /**
     * @param TypeEnum $type 
     * @return self
     */
    public function setType(TypeEnum $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value 
     * @return self
     */
    public function setValue(float $value): self
    {
        $this->value = $value;
        return $this;
    }
}