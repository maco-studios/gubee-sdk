<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;

interface UnitTimeInterface extends ModelInterface
{
    public const DAYS = 'DAYS';

    public const HOURS = 'HOURS';

    public const MONTH = 'MONTH';

    public const TYPE_LIST = [self::DAYS, self::HOURS, self::MONTH];

    /**
     * Set the type property
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;
    /**
     * Get the type property
     *
     * @return string
     */
    public function getType(): string;
    /**
     * Set the value property
     *
     * @param int $value
     * @return $this
     */
    public function setValue(int $value): self;
    /**
     * Get the value property
     *
     * @return int
     */
    public function getValue(): int;
}
