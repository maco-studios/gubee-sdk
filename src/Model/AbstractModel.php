<?php

declare(strict_types=1);

namespace Gubee\SDK\Model;

abstract class AbstractModel implements \JsonSerializable
{

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

}
