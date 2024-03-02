<?php

namespace Gubee\SDK\Api\Sales\Order\OrderCustomer;

use Gubee\SDK\Api\ModelInterface;

interface PhoneInterface extends ModelInterface
{
    public const CELLPHONE = 'CELLPHONE';

    public const COMMERCIAL = 'COMMERCIAL';

    public const HOME = 'HOME';

    public const TYPE_LIST = [self::CELLPHONE, self::COMMERCIAL, self::HOME];

    /**
     * Set the ddd property
     *
     * @param int $ddd
     * @return $this
     */
    public function setDdd(int $ddd): self;
    /**
     * Get the ddd property
     *
     * @return int
     */
    public function getDdd(): int;
    /**
     * Set the number property
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self;
    /**
     * Get the number property
     *
     * @return string
     */
    public function getNumber(): string;
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
}
