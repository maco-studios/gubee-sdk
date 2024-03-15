<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Variation;

use Gubee\SDK\Api\ServiceProviderInterface;
use Gubee\SDK\Enum\Catalog\Product\Variation\Price\TypeEnum;
use Gubee\SDK\Model\AbstractModel;
use Gubee\SDK\Model\Catalog\Product\Attribute\Dimension\ValidityPeriod;
use Gubee\SDK\Resource\Catalog\Product\Variation\PriceResource;

class Price extends AbstractModel
{
    protected TypeEnum $type;
    protected float $value;
    protected ValidityPeriod $validityPeriod;
    protected PriceResource $priceResource;

    /**
     * @param string|TypeEnum $type
     * @param array|ValidityPeriod $validityPeriod
     */
    public function __construct(
        PriceResource $priceResource,
        ServiceProviderInterface $serviceProvider,
        $type,
        float $value,
        $validityPeriod = null
    )
    {
        if (is_string($type)) {
            $type = TypeEnum::fromValue($type);
        }
        $this->setType($type);
        $this->setValue($value);
        if ($validityPeriod) {
            if (is_array($validityPeriod)) {
                $validityPeriod = $serviceProvider->create(
                    ValidityPeriod::class,
                    $validityPeriod
                );
            }
            $this->validityPeriod = $validityPeriod;
        }
    }

    public function save(string $productId, string $skuId): self
    {
        return $this->priceResource->updatePriceBySkuId(
            $productId,
            $skuId,
            $this
        );
    }

    /**
     * @return TypeEnum
     */
    public function getType(): TypeEnum
    {
        return $this->type;
    }

    /**
     * @param TypeEnum $type 
     * @return self
     */
    public function setType(TypeEnum $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value 
     * @return self
     */
    public function setValue(float $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function getValidityPeriod(): ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @param ValidityPeriod $validityPeriod 
     * @return self
     */
    public function setValidityPeriod(ValidityPeriod $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }
}