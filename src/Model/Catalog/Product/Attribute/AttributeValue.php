<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Model\AbstractModel;

class AttributeValue extends AbstractModel
{

    protected string $attribute;
    /** @var array<mixed> */
    protected array $values;

    public function __construct(
        string $attribute,
        array $values = []
    )
    {
        $this->attribute = $attribute;
        $this->values = $values;
    }


    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @param string $attribute 
     * @return self
     */
    public function setAttribute(string $attribute): self
    {
        $this->attribute = $attribute;
        return $this;
    }

    /**
     * 
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * 
     * @param array $values 
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->values = $values;
        return $this;
    }
}