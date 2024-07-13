<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog;

use Gubee\SDK\Model\Catalog\Category;
use Gubee\SDK\Resource\AbstractResource;

use function array_map;
use function rawurlencode;
use function sprintf;

class CategoryResource extends AbstractResource
{
    /**
     * POST
     * /integration/categories
     * Create category
     */
    public function create(Category $category): Category
    {
        $response = $this->post(
            '/integration/categories',
            $category->jsonSerialize()
        );

        return Category::fromJson($response);
    }

    /**
     * GET
     * /integration/categories/{externalId}
     * Get category by externalId
     */
    public function getByExternalId(string $externalId): Category
    {
        $response = $this->get(
            sprintf(
                "/integration/categories/%s",
                rawurlencode($externalId)
            )
        );

        return Category::fromJson($response);
    }

    /**
     * PUT
     * /integration/categories/{externalId}
     * Update category
     */
    public function updateByExternalId(string $externalId, Category $category): Category
    {
        $response = $this->put(
            sprintf(
                "/integration/categories/%s",
                rawurlencode($externalId)
            ),
            $category->jsonSerialize()
        );

        return Category::fromJson($response);
    }

    /**
     * POST
     * /integration/categories/bulk
     * Create category
     */
    public function createBulk(array $categories): array
    {
        $response = $this->post(
            '/integration/categories/bulk',
            array_map(
                fn(Category $category) => $category->jsonSerialize(),
                $categories
            )
        );

        return array_map(
            function (array $category) {
                return Category::fromJson($category);
            },
            $response
        );
    }

    /**
     * PUT
     * /integration/categories/bulk
     * Update category
     */
    public function updateBulk(array $categories): array
    {
        $response = $this->put(
            '/integration/categories/bulk',
            array_map(
                fn(Category $category) => $category->jsonSerialize(),
                $categories
            )
        );

        return array_map(
            function (array $category) {
                return Category::fromJson($category);
            },
            $response
        );
    }

    /**
     * GET
     * /integration/categories/byId/{id}
     * Get category by gubee
     */
    public function getById(string $id): Category
    {
        $response = $this->get(
            sprintf(
                "/integration/categories/byId/%s",
                rawurlencode($id)
            )
        );

        return Category::fromJson($response);
    }
}
