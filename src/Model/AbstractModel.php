<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use JsonSerializable;

use function get_object_vars;

abstract class AbstractModel implements JsonSerializable
{
    /**
     * Convert the object to a JSON-serializable array.
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
