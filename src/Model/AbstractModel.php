<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

use JsonSerializable;

use function get_object_vars;

abstract class AbstractModel implements JsonSerializable
{
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
