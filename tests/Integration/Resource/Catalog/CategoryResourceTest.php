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

        $payload = [
            'id' => $faker->uuid,
            'name' => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active' => true,
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
        $faker = Factory::create();
        $payload = [
            'id' => $faker->uuid,
            'name' => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active' => true,
            'parent' => $parentCategory->getId(),
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
        $faker = Factory::create();
        $payload = [
            'name' => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active' => false,
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

    /**
     * Create category
     */
    public function testCreateCategoryBulk(): array
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $payload[] = [
                'name' => sprintf(
                    "Category %s",
                    $faker->name
                ),
                'description' => $faker->text,
                'active' => false,
            ];
        }

        $categories = [];
        foreach ($payload as $item) {
            $category = new Category(
                $faker->uuid,
                $item['name'],
                $item['description'],
                $item['active']
            );
            $categories[] = $category;
        }

        $response = $this->client->category()->createBulk($categories);
        $this->assertIsArray($response);
        $this->assertCount(5, $response);
        foreach ($response as $key => $item) {
            $this->assertInstanceOf(
                Category::class,
                $item
            );
            $this->assertEquals(
                $categories[$key]->getName(),
                $item->getName()
            );
            $this->assertEquals(
                $categories[$key]->getDescription(),
                $item->getDescription()
            );
            $this->assertEquals(
                $categories[$key]->getActive(),
                $item->getActive()
            );
            $this->assertEquals(
                $categories[$key]->getId(),
                $item->getId()
            );
        }

        return $response;
    }

    /**
     * @depends testCreateCategoryBulk
     * @param array $categories
     * @return void
     */
    public function testUpdateBulk(array $categories)
    {
        $faker = Factory::create();
        $originalData = [];
        foreach ($categories as $category) {
            $originalData[] = $category->jsonSerialize();
            $category->setName(
                sprintf(
                    "Category %s",
                    $faker->name
                )
            );
        }

        $response = $this->client->category()->updateBulk($categories);
        $this->assertIsArray($response);
        $this->assertCount(5, $response);
        foreach ($response as $key => $item) {
            $this->assertInstanceOf(
                Category::class,
                $item
            );
            $this->assertNotEquals(
                $originalData[$key]['name'],
                $item->getName()
            );
            $this->assertEquals(
                $categories[$key]->getDescription(),
                $item->getDescription()
            );
            $this->assertEquals(
                $categories[$key]->getActive(),
                $item->getActive()
            );
            $this->assertEquals(
                $categories[$key]->getId(),
                $item->getId()
            );
        }
    }
}
