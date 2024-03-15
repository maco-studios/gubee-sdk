<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use InvalidArgumentException;
use JsonSerializable;

use function array_filter;
use function get_object_vars;
use function is_a;

class AbstractModel implements JsonSerializable
{
    /**
     * @return array<int|string, mixed>
     */
    public function jsonSerialize(): array
    {
        $values = get_object_vars($this);
        $values = array_filter(
            $values,
            function ($value) {
                return $value !== null;
            }
        );
        return $values;
    }

    /**
     * Validate if all elements inside a array is from a specific type
     *
     * @param array<int|string, mixed> $array The array to be validated
     * @param string $type Can be a scalar or class name to be validated
     * @throws InvalidArgumentException If the array contains elements of
     * different types.
     */
    protected function validateArrayElements(array $array, string $type): bool
    {
        foreach ($array as $element) {
            if (! is_a($element, $type)) {
                throw new InvalidArgumentException(
                    "The array contains elements of different types."
                );
            }
        }
        return true;
    }
}
