<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\PriceInterface;
use Gubee\SDK\Resource\AbstractResource;

class PriceResource extends AbstractResource
{
    /**
     * Get prices of itemId -> (skuId for product, adId for ad)
     *
     * @param string $itemId
     * @return array
     */
    public function getPricesByPlatform(string $platform, string $itemId): array
    {
        return $this->get('/integration/prices/:platform/:itemId', [
            ':platform' => $platform,
            ':itemId'   => $itemId,
        ]);
    }

    /**
     * Update price of skuId product
     *
     * @param string $productId
     * @param string $skuId
     * @param PriceInterface $price
     * @return array
     */
    public function updatePrice(string $productId, string $skuId, PriceInterface $price): array
    {
        return $this->put(
            '/integration/prices/:productId/:skuId',
            $price->jsonSerialize(),
            [],
            [],
            [
                ':productId' => $productId,
                ':skuId'     => $skuId,
            ]
        );
    }

    /**
     * Get price of itemId -> (skuId for product, adId for ad)
     *
     * @param string $itemId
     * @return array
     */
    public function getPriceByItemId(string $itemId): array
    {
        return $this->post(
            '/integration/prices/byItemId/:itemId',
            [],
            [],
            [],
            [
                ':itemId' => $itemId,
            ],
        );
    }

    /**
     * List prices of itemIds -> (skuId for product, adId for ad)
     *
     * @param array $itemIds
     * @return array
     */
    public function getPricesByItemIds(array $itemIds): array
    {
        return $this->post(
            '/integration/prices/byItemIds',
            $itemIds
        );
    }

    /**
     * Update prices of skuId product
     *
     * @param string $productId
     * @param string $skuId
     * @param array $prices
     * @return array
     */
    public function updatePrices(string $productId, string $skuId, array $prices): array
    {
        return $this->put(
            '/integration/prices/list/:productId/:skuId',
            $prices,
            [],
            [],
            [
                ':productId' => $productId,
                ':skuId'     => $skuId,
            ]
        );
    }

    /**
     * Update prices by platform
     *
     * @param string $itemId
     * @param array $prices
     * @return array
     */
    public function updatePricesByPlatform(string $itemId, array $prices): array
    {
        return $this->put(
            '/integration/prices/platforms/:itemId',
            $prices,
            [],
            [],
            [
                ':itemId' => $itemId,
            ]
        );
    }
}
