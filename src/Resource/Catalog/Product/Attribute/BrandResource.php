<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product\Attribute;

use Gubee\SDK\Api\Catalog\Product\Attribute\BrandInterface;
use Gubee\SDK\Resource\AbstractResource;

class BrandResource extends AbstractResource
{
    /**
     * Create brand
     *
     * @return array
     */
    public function create(BrandInterface $brand): array
    {
        return $this->post('/integration/brands', $brand->jsonSerialize());
    }

    /**
     * Load brand by external id
     *
     * @return array
     */
    public function loadByExternalId(string $externalId): array
    {
        return $this->get(
            "/integration/brands/:externalId",
            [
                ':externalId' => $externalId,
            ]
        );
    }

    /**
     * Update brand by external id
     *
     * @return array
     */
    public function updateByExternalId(string $externalId, BrandInterface $brand): array
    {
        return $this->put(
            "/integration/brands/byExternalId/:externalId",
            $brand->jsonSerialize(),
            [],
            [],
            [
                ':externalId' => $externalId,
            ],
        );
    }

    /**
     * Load brand by id
     *
     * @return array
     */
    public function loadById(string $id): array
    {
        return $this->get(
            "/integration/brands/byId/:id",
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * Load brand by name
     *
     * @return array
     */
    public function loadByName(string $name): array
    {
        return $this->get(
            "/integration/brands/byName",
            [
                'name' => $name,
            ]
        );
    }

    /**
     * Create brand by name
     *
     * @return array
     */
    public function createByName(string $name): array
    {
        return $this->post(
            "/integration/brands/byName",
            [
                'name' => $name,
            ]
        );
    }

    /**
     * Update brand by name
     *
     * @return array
     */
    public function updateByName(string $name, BrandInterface $brand): array
    {
        return $this->put(
            "/integration/brands/byName",
            $brand->jsonSerialize(),
            [],
            [],
            [
                'name' => $name,
            ],
        );
    }

    /**
     * Update brand by name V2
     *
     * @return array
     */
    public function updateByNameV2(string $name, BrandInterface $brand): array
    {
        return $this->put(
            "/integration/brands/v2/byName",
            $brand->jsonSerialize(),
            [],
            [],
            [
                'name' => $name,
            ],
        );
    }
}
