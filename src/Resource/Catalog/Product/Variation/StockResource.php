<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product\Variation;

use Gubee\SDK\Model\Catalog\Product\Variation\Stock;
use Gubee\SDK\Resource\AbstractResource;

use function rawurlencode;

class StockResource extends AbstractResource
{
    public function load(string $itemId, string $warehouseId): Stock
    {
        $response = $this->get(
            '/integration/stocks/' . rawurlencode($itemId) . '/' . rawurlencode($warehouseId)
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Stock::class,
                $response
            );
    }

    public function getStockByPlatform(string $platform, string $itemId, string $warehouseId): Stock
    {
        $response = $this->get(
            '/integration/stocks/' . rawurlencode($platform) . '/' . rawurlencode($itemId) . '/' . rawurlencode($warehouseId)
        );

        return $this->getClient()->getServiceProvider()
        ->create(
            Stock::class,
            $response
        );
    }

    public function updateStock(string $productId, string $skuId, Stock $stock): Stock
    {
        $response = $this->put(
            '/integration/stocks/' . rawurlencode($productId) . '/' . rawurlencode($skuId),
            $stock->jsonSerialize()
        );

        return $this->getClient()->getServiceProvider()
        ->create(
            Stock::class,
            $response
        );
    }

    public function getAllStockByPlatform(string $platform, string $itemId): Stock
    {
        $response = $this->get(
            '/integration/stocks/all/' . rawurlencode($platform) . '/' . rawurlencode($itemId)
        );

        return $this->getClient()->getServiceProvider()
        ->create(
            Stock::class,
            $response
        );
    }

    public function getStockById(string $id): Stock
    {
        $response = $this->get(
            '/integration/stocks/ids/' . rawurlencode($id)
        );

        return $this->getClient()->getServiceProvider()
        ->create(
            Stock::class,
            $response
        );
    }

    public function getStockByIdAndPlatform(string $id, string $platform): Stock
    {
        $response = $this->get(
            '/integration/stocks/ids/' . rawurlencode($id) . '/platforms/' . rawurlencode($platform)
        );

        return $this->getClient()->getServiceProvider()
        ->create(
            Stock::class,
            $response
        );
    }
}
