<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Enum\Catalog\Product\Attribute\Dimension\Weight\TypeEnum;
use Gubee\SDK\Model\AbstractModel;

class Weight extends AbstractModel
{
    protected TypeEnum $type;

    protected float $value;

    /**
     * @param string|TypeEnum $type
     * @param float $value
     */
    public function __construct($type, float $value)
    {
        if (is_string($type)) {
            $type = TypeEnum::fromValue($type);
        }
        $this->setType($type);
        $this->setValue($value);
    }

    /**
     * @return TypeEnum
     */
    public function getType(): TypeEnum
    {
        if ($this->type == TypeEnum::POUND()) {
            return TypeEnum::KILOGRAM();
        }

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
        if ($this->getType() == TypeEnum::POUND()) {
            return $this->value * 0.453592;
        }

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