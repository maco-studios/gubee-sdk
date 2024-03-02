<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use Gubee\SDK\Api\ModelInterface;

abstract class AbstractModel implements ModelInterface
{
    /**
     * Convert the model to an array
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $this->validate();
        return get_object_vars($this);
    }

    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    protected function validate(): bool
    {
        return true;
    }
}
