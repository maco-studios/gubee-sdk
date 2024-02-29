<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\StockInterface;
use Gubee\SDK\Resource\AbstractResource;

class StockResource extends AbstractResource
{
    /**
     * Get stock of itemId (skuId -> Product, adId -> Ad)
     *
     * @param string $itemId
     * @param string $warehouseId
     * @return array
     */
    public function loadStockByItemId(
        string $itemId,
        string $warehouseId
    ): array {
        return $this->get(
            '/integration/stocks/:itemId/:warehouseId',
            [
                ':itemId'      => $itemId,
                ':warehouseId' => $warehouseId,
            ]
        );
    }

    /**
     * Get stock of itemId (skuId -> Product, adId -> Ad)
     *
     * @param string $platform
     * @param string $itemId
     * @param string $warehouseId
     * @return array
     */
    public function loadStockByPlatform(
        string $platform,
        string $itemId,
        string $warehouseId
    ): array {
        return $this->get(
            '/integration/stocks/:platform/:itemId/:warehouseId',
            [
                ':platform'    => $platform,
                ':itemId'      => $itemId,
                ':warehouseId' => $warehouseId,
            ]
        );
    }

    /**
     * Update stock of skuId product
     *
     * @param string $productId
     * @param string $skuId
     * @param StockInterface $stock
     * @return void
     */
    public function updateStockBySkuId(
        string $productId,
        string $skuId,
        StockInterface $stock
    ) {
        return $this->put(
            '/integration/stocks/:productId/:skuId',
            $stock->jsonSerialize(),
            [],
            [],
            [
                ':productId' => $productId,
                ':skuId'     => $skuId,
            ],
        );
    }

    /**
     * Get stocks of itemId (skuId -> Product, adId -> Ad)
     *
     * @param string $itemId
     * @return array
     */
    public function loadStocksByPlatform(
        string $platform,
        string $itemId
    ): array {
        return $this->get(
            '/integration/stocks/all/:platform/:itemId',
            [
                ':platform' => $platform,
                ':itemId'   => $itemId,
            ]
        );
    }

    /**
     * Get stock by id
     *
     * @param string $id
     * @return array
     */
    public function loadStockById(
        string $id
    ): array {
        return $this->get(
            '/integration/stocks/ids/:id',
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * Get stock by id and platform
     *
     * @param string $id
     * @param string $platform
     * @return array
     */
    public function loadStockByIdAndPlatform(
        string $id,
        string $platform
    ): array {
        return $this->get(
            '/integration/stocks/ids/:id/platforms/:platform',
            [
                ':id'       => $id,
                ':platform' => $platform,
            ]
        );
    }
}
