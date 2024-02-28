<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog;

use Gubee\SDK\Api\Catalog\CategoryInterface;
use Gubee\SDK\Resource\AbstractResource;

class CategoryResource extends AbstractResource
{
    /**
     * Create a new category
     *
     * @return array
     */
    public function create(CategoryInterface $category)
    {
        return $this->post(
            '/integration/categories',
            $category->jsonSerialize(),
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ]
        );
    }

    /**
     * Load a category by its external ID
     *
     * @return array
     */
    public function loadByExternalId(string $externalId): array
    {
        return $this->get(
            '/integration/categories/:externalId',
            [
                ':externalId' => $externalId,
            ],
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ]
        );
    }

    /**
     * Update a category by its external ID
     *
     * @return array
     */
    public function updateByExternalId(string $externalId, CategoryInterface $category): array
    {
        return $this->put(
            '/integration/categories/:externalId',
            $category->jsonSerialize(),
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ],
            [],
            [
                ':externalId' => $externalId,
            ],
        );
    }

    /**
     * Create multiple categories at once
     *
     * @param array<CategoryInterface> $categories
     * @return array
     */
    public function createBulk(array $categories): array
    {
        return $this->post(
            '/integration/categories/bulk',
            $categories,
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ]
        );
    }

    /**
     * Update multiple categories at once
     *
     * @param array<CategoryInterface> $categories
     * @return array
     */
    public function updateBulk(array $categories): array
    {
        return $this->put(
            '/integration/categories/bulk',
            $categories,
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ]
        );
    }

    /**
     * Load a category by its ID
     *
     * @return array
     */
    public function loadById(string $id)
    {
        return $this->get(
            '/integration/categories/byId/:id',
            [
                ':id' => $id,
            ],
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ]
        );
    }
}
