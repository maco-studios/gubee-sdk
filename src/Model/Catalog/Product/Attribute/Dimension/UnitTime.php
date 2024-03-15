<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Enum\Catalog\Product\Attribute\Dimension\UnitTime\TypeEnum;
use Gubee\SDK\Model\AbstractModel;

class UnitTime extends AbstractModel
{
    protected TypeEnum $type;
    protected int $value;

    /**
     * @param string|TypeEnum $type
     * @param int $value
     */
    public function __construct(
        $type,
        int $value
    )
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
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value 
     * @return self
     */
    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }
}