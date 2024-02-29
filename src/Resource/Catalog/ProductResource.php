<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog;

use Exception;
use Gubee\SDK\Api\Catalog\Product\Media\ImageInterface;
use Gubee\SDK\Api\Catalog\ProductInterface;
use Gubee\SDK\Resource\AbstractResource;

class ProductResource extends AbstractResource
{
    /**
     * Create product
     *
     * @return array
     */
    public function create(ProductInterface $product): array
    {
        return $this->post('/integration/products', $product->jsonSerialize());
    }

    /**
     * Load product by external id
     *
     * @param string $externalId
     * @return array
     */
    public function loadById(string $productId): array
    {
        return $this->get(
            "/integration/products/:productId",
            [
                ':productId' => $productId,
            ]
        );
    }

    /**
     * Update product by external id
     *
     * @return void
     */
    public function update(ProductInterface $product)
    {
        $this->put(
            "/integration/products/:productId",
            $product->jsonSerialize(),
            [],
            [],
            [
                ':productId' => $product->getId(),
            ],
        );
    }

    /**
     * Delete product by external id
     *
     * @param string $externalId
     * @return array
     */
    public function deleteById(string $productId): array
    {
        return $this->delete(
            "/integration/products/:productId",
            [
                ':productId' => $productId,
            ]
        );
    }

    /**
     * Load product by sku
     *
     * @return array
     */
    public function loadBySku(string $sku): array
    {
        return $this->get(
            "/integration/products/bySku/:sku",
            [
                ':sku' => $sku,
            ]
        );
    }

    /**
     * Load product by skuId
     *
     * @return array
     */
    public function loadBySkuId(string $skuId): array
    {
        return $this->get(
            "/integration/products/bySkuId/:skuId",
            [
                ':skuId' => $skuId,
            ]
        );
    }

    /**
     * Update the list of image of skuId
     *
     * @param array<ImageInterface> $images
     * @return array
     */
    public function updateImage(string $productId, string $skuId, array $images): array
    {
        return $this->put(
            "/integration/products/image/:productId/:skuId",
            $images,
            [],
            [],
            [
                ':productId' => $productId,
                ':skuId'     => $skuId,
            ],
        );
    }

    /**
     * search products
     *
     * @todo Not implemented
     */
    public function search(): array
    {
        throw new Exception('Not implemented');
    }

    /**
     * list products
     *
     * @todo Not implemented
     */
    public function listAll(): array
    {
        throw new Exception('Not implemented');
    }

    /**
     * Get api product by productId
     *
     * @return array
     */
    public function loadByIdV2(string $productId): array
    {
        return $this->get(
            "/integration/products/v2/byProductId/:productId",
            [
                ':productId' => $productId,
            ]
        );
    }

    /**
     * Get api product by variations.skuId
     *
     * @return array
     */
    public function loadBySkuIdV2(string $skuId): array
    {
        return $this->get(
            "/integration/products/v2/bySkuId/:skuId",
            [
                ':skuId' => $skuId,
            ]
        );
    }
}
