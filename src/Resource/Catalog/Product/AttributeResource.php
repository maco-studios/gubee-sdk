<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product;

use Gubee\SDK\Model\Catalog\Product\Attribute;
use Gubee\SDK\Resource\AbstractResource;

class AttributeResource extends AbstractResource
{
    // POST
    // /integration/attributes
    // Create attribute
    public function create(Attribute $attribute) {
        $response = $this->post(
            '/integration/attributes',
            $attribute->jsonSerialize()
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Attribute::class,
                $response
            );
    }

    // GET
    // /integration/attributes/{externalId}
    // Get attribute by externalId
    public function loadByExternalId(string $externalId) {
        $response = $this->get(
            '/integration/attributes/' . rawurlencode($externalId)
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Attribute::class,
                $response
            );
    }

    // PUT
    // /integration/attributes/{externalId}
    // Update attribute
    public function updateByExternalId(string $externalId, Attribute $attribute) {
        $response = $this->put(
            '/integration/attributes/' . rawurlencode($externalId),
            $attribute->jsonSerialize()
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Attribute::class,
                $response
            );
    }

    // POST
    // /integration/attributes/bulk
    // Bulk create attribute
    public function bulkCreate(array $attributes) {
        $response = $this->post(
            '/integration/attributes/bulk',
            $attributes
        );

        foreach ($response as $key => $value) {
            $response[$key] = $this->getClient()->getServiceProvider()
                ->create(
                    Attribute::class,
                    $value
                );
        }

        return $response;
    }

    // PUT
    // /integration/attributes/bulk
    // Update attribute
    public function bulkUpdate(array $attributes) {
        $response = $this->put(
            '/integration/attributes/bulk',
            $attributes
        );

        foreach ($response as $key => $value) {
            $response[$key] = $this->getClient()->getServiceProvider()
                ->create(
                    Attribute::class,
                    $value
                );
        }

        return $response;
    }

    // GET
    // /integration/attributes/byId/{id}
    // Get attribute by gubee id
    public function loadById(string $id) {
        $response = $this->get(
            '/integration/attributes/byId/' . rawurlencode($id)
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Attribute::class,
                $response
            );
    }

    // GET
    // /integration/attributes/byName/{name}
    // Get attribute by name
    public function loadByName(string $name) {
        $response = $this->get(
            '/integration/attributes/byName/' . rawurlencode($name)
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Attribute::class,
                $response
            );
    }

    // PUT
    // /integration/attributes/byName/{name}
    // Update attribute
    public function updateByName(string $name, Attribute $attribute) {
        $response = $this->put(
            '/integration/attributes/byName/' . rawurlencode($name),
            $attribute->jsonSerialize()
        );

        return $this->getClient()->getServiceProvider()
            ->create(
                Attribute::class,
                $response
            );
    }
}
