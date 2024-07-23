<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product;

use Gubee\SDK\Model\Catalog\Product\Attribute;
use Gubee\SDK\Resource\AbstractResource;

class AttributeResource extends AbstractResource
{

    /**
     * POST
     * /integration/attributes
     * Create attribute
     */
    public function create(Attribute $attribute)
    {
        return Attribute::fromJson(
            $this->post(
                '/integration/attributes',
                $attribute->jsonSerialize()
            )
        );
    }

    /**
     * GET
     * /integration/attributes/{externalId}
     * Get attribute by externalId
     */
    public function getByExternalId(string $externalId)
    {
        return Attribute::fromJson(
            $this->get(
                sprintf(
                    "/integration/attributes/%s",
                    rawurlencode($externalId)
                )
            )
        );
    }
    /**
     * PUT
     * /integration/attributes/{externalId}
     * Update attribute
     */
    public function update(string $externalId, Attribute $attribute)
    {
        return Attribute::fromJson(
            $this->put(
                sprintf(
                    "/integration/attributes/%s",
                    rawurlencode($externalId)
                ),
                $attribute->jsonSerialize()
            )
        );
    }

    /**
     * POST
     * /integration/attributes/bulk
     * Bulk create attribute
     */
    public function bulkCreate(array $attributes)
    {
        $response = $this->post(
            '/integration/attributes/bulk',
            array_map(
                function (Attribute $attribute) {
                    return $attribute->jsonSerialize();
                },
                $attributes
            )
        );

        return array_map(
            function (array $attribute) {
                return $this->getById($attribute['hubeeId']);
            },
            $response
        );
    }
    /**
     * PUT
     * /integration/attributes/bulk
     * Update attribute
     */
    public function bulkUpdate(array $attributes)
    {
        $response = $this->put(
            '/integration/attributes/bulk',
            array_map(
                function (Attribute $attribute) {
                    return $attribute->jsonSerialize();
                },
                $attributes
            )
        );

        return array_map(
            function (array $attribute) {
                return $this->getById($attribute['hubeeId']);
            },
            $response
        );
    }

    /**
     * GET
     * /integration/attributes/byId/{id}
     * Get attribute by gubee id
     */
    public function getById(string $id)
    {
        return Attribute::fromJson(
            $this->get(
                sprintf(
                    "/integration/attributes/byId/%s",
                    rawurlencode($id)
                )
            )
        );
    }

    /**
     * GET
     * /integration/attributes/byName/{name}
     * Get attribute by name
     */
    public function getByName(string $name)
    {
        return Attribute::fromJson(
            $this->get(
                sprintf(
                    "/integration/attributes/byName/%s",
                    rawurlencode($name)
                )
            )
        );
    }

    /**
     * PUT
     * /integration/attributes/byName/{name}
     * Update attribute
     */
    public function updateByName(string $name, Attribute $attribute)
    {
        return Attribute::fromJson(
            $this->put(
                sprintf(
                    "/integration/attributes/byName/%s",
                    rawurlencode($name)
                ),
                $attribute->jsonSerialize()
            )
        );
    }

}
