<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\ValueInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;

use function get_class;
use function gettype;
use function is_object;
use function is_string;
use function sprintf;

class Value extends AbstractModel implements ValueInterface
{
    protected string $attribute;

    /** @var array<string> */
    protected array $values;

    /**
     * Set the attribute name
     */
    public function setAttribute(string $attribute): self
    {
        $this->attribute = $attribute;
        return $this;
    }

    /**
     * Get the attribute name
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * Set the values of the attribute
     *
     * @param array<string> $values
     */
    public function setValues(array $values): self
    {
        foreach ($values as $value) {
            if (! is_string($value)) {
                throw new InvalidArgumentException(
                    sprintf(
                        "The value of the attribute must be a string, %s given",
                        is_object($value) ? get_class($value) : gettype($value)
                    )
                );
            }
        }

        $this->values = $values;
        return $this;
    }

    /**
     * Get the values of the attribute
     *
     * @return array<string>
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
