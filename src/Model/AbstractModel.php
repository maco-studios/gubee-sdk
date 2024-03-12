<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use JsonSerializable;

use function get_object_vars;

class AbstractModel implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
