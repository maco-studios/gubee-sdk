<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product;

use Gubee\SDK\Api\Catalog\Product\AttributeInterface;
use Gubee\SDK\Resource\AbstractResource;

class AttributeResource extends AbstractResource
{
    /**
     * Create attribute
     *
     * @return array
     */
    public function create(AttributeInterface $attribute): array
    {
        return $this->post('/integration/attributes', $attribute->jsonSerialize());
    }

    /**
     * Get attribute by externalId
     *
     * @return array
     */
    public function getByExternalId(string $externalId): array
    {
        return $this->get(
            "/integration/attributes/:externalId",
            [
                'externalId' => $externalId,
            ]
        );
    }

    /**
     * Update attribute
     *
     * @return array
     */
    public function updateByExternalId(string $externalId, AttributeInterface $attribute): array
    {
        return $this->put(
            "/integration/attributes/:externalId",
            $attribute->jsonSerialize(),
            [],
            [],
            [
                'externalId' => $externalId,
            ]
        );
    }

    /**
     * Bulk create attribute
     *
     * @param array<AttributeInterface> $attributes
     * @return array
     */
    public function bulkCreate(array $attributes): array
    {
        return $this->post('/integration/attributes/bulk', $attributes);
    }

    /**
     * Update attribute
     *
     * @param array<AttributeInterface> $attributes
     * @return array
     */
    public function bulkUpdate(array $attributes): array
    {
        return $this->put('/integration/attributes/bulk', $attributes);
    }

    /**
     * Get attribute by gubee id
     *
     * @return array
     */
    public function getById(string $id): array
    {
        return $this->get(
            "/integration/attributes/byId/:id",
            [
                'id' => $id,
            ]
        );
    }

    /**
     * Get attribute by name
     *
     * @return array
     */
    public function getByName(string $name): array
    {
        return $this->get(
            "/integration/attributes/byName/:name",
            [
                'name' => $name,
            ]
        );
    }

    /**
     * Update attribute
     *
     * @return array
     */
    public function updateByName(string $name, AttributeInterface $attribute): array
    {
        return $this->put(
            "/integration/attributes/byName/:name",
            $attribute->jsonSerialize(),
            [],
            [],
            [
                'name' => $name,
            ]
        );
    }
}
