<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute\Dimension;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\Dimension\TypedValueInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;
use ReflectionClass;

use function implode;
use function in_array;
use function is_numeric;
use function sprintf;

class AbstractDimension extends AbstractModel implements TypedValueInterface
{
    protected string $type;
    protected float $value;

    /**
     * Set the type of the measure.
     *
     * @param string $type The type of the measure.
     */
    public function setType(string $type): self
    {
        $consts = (new ReflectionClass($this))->getConstants();
        if (! in_array($type, $consts)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The type '%s' is not valid. The valid types are: %s",
                    $type,
                    implode(", ", $consts)
                )
            );
        }
        $this->type = $type;
        return $this;
    }

    /**
     * Get the type of the measure.
     *
     * @return string The type of the measure.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of the measure.
     *
     * @param float|int $value The value of the measure.
     */
    public function setValue($value): self
    {
        if (! is_numeric($value)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The value '%s' is not valid. The value must be a number.",
                    $value
                )
            );
        }
        $this->value = $value;
        return $this;
    }

    /**
     * Get the value of the measure.
     *
     * @return float|int The value of the measure.
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
