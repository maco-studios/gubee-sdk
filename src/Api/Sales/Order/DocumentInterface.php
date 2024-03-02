<?php

namespace Gubee\SDK\Api\Sales\Order;

use Gubee\SDK\Api\ModelInterface;

interface DocumentInterface extends ModelInterface
{
    public const CNPJ = 'CNPJ';

    public const CPF = 'CPF';

    public const RG = 'RG';

    public const TYPE_LIST = [self::CNPJ, self::CPF, self::RG];

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
