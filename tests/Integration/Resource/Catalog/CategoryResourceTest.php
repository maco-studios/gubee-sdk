<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration\Resource\Catalog;

use Faker\Factory;
use Gubee\SDK\Model\Catalog\Category;
use Gubee\SDK\Tests\Integration\AbstractIntegration;

use function sprintf;

class CategoryResourceTest extends AbstractIntegration
{
    public function testCreateCategory(): Category
    {
        $faker = Factory::create();

        $payload  = [
            'id'          => $faker->uuid,
            'name'        => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active'      => true,
        ];
        $category = new Category(
            $payload['id'],
            $payload['name'],
            $payload['description'],
            $payload['active']
        );
        $response = $this->client->category()->create($category);
        $this->assertInstanceOf(
            Category::class,
            $response
        );
        $this->assertEquals(
            $category->getName(),
            $response->getName()
        );
        $this->assertEquals(
            $category->getDescription(),
            $response->getDescription()
        );
        $this->assertEquals(
            $category->getActive(),
            $response->getActive()
        );
        $this->assertEquals(
            $category->getId(),
            $response->getId()
        );
        return $response;
    }

    /**
     * @depends testCreateCategory
     * @return Category
     */
    public function testParentCategory(
        Category $parentCategory
    ) {
        $faker   = Factory::create();
        $payload = [
            'id'          => $faker->uuid,
            'name'        => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active'      => true,
            'parent'      => $parentCategory->getId(),
        ];

        $category = new Category(
            $payload['id'],
            $payload['name'],
            $payload['description'],
            $payload['active'],
            false,
            $payload['parent']
        );
        $response = $this->client->category()->create($category);
        $this->assertInstanceOf(
            Category::class,
            $response
        );
        $this->assertEquals(
            $category->getName(),
            $response->getName()
        );
        $this->assertEquals(
            $category->getDescription(),
            $response->getDescription()
        );
        $this->assertEquals(
            $category->getActive(),
            $response->getActive()
        );
        $this->assertEquals(
            $category->getId(),
            $response->getId()
        );
        $this->assertEquals(
            $category->getParent(),
            $response->getParent()
        );

        return $response;
    }

    /**
     * Update category
     *
     * @depends testParentCategory
     */
    public function testUpdateCategoryByExternalId(
        Category $category
    ): Category {
        $faker   = Factory::create();
        $payload = [
            'name'        => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active'      => false,
        ];
        $category->setName($payload['name']);
        $category->setDescription($payload['description']);
        $category->setActive($payload['active']);
        $response = $this->client->category()->updateByExternalId(
            $category->getId(),
            $category
        );
        $this->assertInstanceOf(
            Category::class,
            $response
        );
        $this->assertEquals(
            $category->getName(),
            $response->getName()
        );
        $this->assertEquals(
            $category->getDescription(),
            $response->getDescription()
        );
        $this->assertEquals(
            $category->getActive(),
            $response->getActive()
        );
        $this->assertEquals(
            $category->getId(),
            $response->getId()
        );
        return $response;
    }

    /**
     * Get category by externalId
     *
     * @depends testUpdateCategoryByExternalId
     */
    public function testGetById(Category $category): Category
    {
        $response = $this->client->category()->getByExternalId(
            $category->getId()
        );
        $this->assertInstanceOf(
            Category::class,
            $response
        );
        $this->assertEquals(
            $category->getName(),
            $response->getName()
        );
        $this->assertEquals(
            $category->getDescription(),
            $response->getDescription()
        );
        $this->assertEquals(
            $category->getActive(),
            $response->getActive()
        );
        $this->assertEquals(
            $category->getId(),
            $response->getId()
        );
        return $response;
    }
}
