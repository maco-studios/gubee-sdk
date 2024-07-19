<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource\Catalog;

use Faker\Factory;
use Gubee\SDK\Model\Catalog\Category;
use Gubee\SDK\Tests\Contract\Resource\AbstractResource;
use PHPUnit\Framework\TestCase;

class CategoryResourceTest extends AbstractResource
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->token = 'apitoken';
        $this->client->authenticate($this->token);
    }

    public function testCreate(): Category
    {
        $faker = Factory::create();

        $requestPayload = [
            'id' => $faker->uuid,
            'name' => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active' => true,
            "enabledAutoIntegration" => false
        ];

        $request = $this->createRequest(
            '/api/integration/categories',
            'POST',
            true,
            $requestPayload,
            [
                'Content-Type' => 'application/json',
            ]
        );
        $responsePayload = array_merge(
            $requestPayload,
            [
                'hubeeId' => $faker->uuid,
            ]
        );

        $response = $this->createResponse(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            $responsePayload
        );

        $interaction = $this->createInteraction(
            "Create category",
            $request,
            $response
        );

        $category = new Category(
            $requestPayload['id'],
            $requestPayload['name'],
            $requestPayload['description'],
            $requestPayload['active']
        );

        $categoryResponse = $this->client->category()->create($category);

        $this->assertEquals(
            $responsePayload['hubeeId'],
            $categoryResponse->getHubeeId()
        );

        $this->assertEquals(
            $requestPayload['id'],
            $categoryResponse->getId()
        );

        $this->assertEquals(
            $requestPayload['name'],
            $categoryResponse->getName()
        );

        $this->assertEquals(
            $requestPayload['description'],
            $categoryResponse->getDescription()
        );

        $this->assertEquals(
            $requestPayload['active'],
            $categoryResponse->getActive()
        );

        $interaction->verify();

        return $categoryResponse;
    }

    /**
     * @depends testCreate
     * @param \Gubee\SDK\Model\Catalog\Category $category
     * @return Category
     */
    public function testGetByExternalId(Category $category)
    {
        $request = $this->createRequest(
            sprintf(
                '/api/integration/categories/%s',
                rawurlencode($category->getId())
            ),
            'GET',
            true,
        );

        $response = $this->createResponse(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            $category->jsonSerialize()
        );

        $interaction = $this->createInteraction(
            "Get category by external id",
            $request,
            $response
        );

        $categoryResponse = $this->client->category()->getByExternalId($category->getId());

        $this->assertEquals(
            $category->getHubeeId(),
            $categoryResponse->getHubeeId()
        );

        $this->assertEquals(
            $category->getId(),
            $categoryResponse->getId()
        );

        $this->assertEquals(
            $category->getName(),
            $categoryResponse->getName()
        );

        $this->assertEquals(
            $category->getDescription(),
            $categoryResponse->getDescription()
        );

        $this->assertEquals(
            $category->getActive(),
            $categoryResponse->getActive()
        );



        $interaction->verify();

        return $categoryResponse;
    }

    /**
     * @depends testGetByExternalId
     *
     * @return void
     */
    public function testUpdateByExternalId(
        Category $category
    ): Category {
        $faker = Factory::create();

        $requestPayload = [
            'id' => $category->getId(),
            'name' => sprintf(
                "Category %s",
                $faker->name
            ),
            'description' => $faker->text,
            'active' => true,
            "enabledAutoIntegration" => false
        ];

        $request = $this->createRequest(
            sprintf(
                '/api/integration/categories/%s',
                $category->getId()
            ),
            'PUT',
            true,
            $requestPayload,
            [
                'Content-Type' => 'application/json',
            ]
        );

        $responsePayload = array_merge(
            $requestPayload,
            [
                'hubeeId' => $category->getHubeeId(),
            ]
        );

        $response = $this->createResponse(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            $responsePayload
        );

        $interaction = $this->createInteraction(
            "Update category",
            $request,
            $response
        );

        $category = new Category(
            $requestPayload['id'],
            $requestPayload['name'],
            $requestPayload['description'],
            $requestPayload['active']
        );

        $categoryResponse = $this->client->category()->updateByExternalId(
            $category->getId(),
            $category
        );

        $this->assertEquals(
            $responsePayload['hubeeId'],
            $categoryResponse->getHubeeId()
        );

        $this->assertEquals(
            $requestPayload['id'],
            $categoryResponse->getId()
        );

        $this->assertEquals(
            $requestPayload['name'],
            $categoryResponse->getName()
        );

        $this->assertEquals(
            $requestPayload['description'],
            $categoryResponse->getDescription()
        );

        $this->assertEquals(
            $requestPayload['active'],
            $categoryResponse->getActive()
        );

        $interaction->verify();

        return $categoryResponse;
    }

    public function testCreateBulk(
    ): array {
        $faker = Factory::create();

        $payload = [];
        for ($i = 0; $i < 5; $i++) {
            $payload[] = new Category(
                $faker->uuid,
                sprintf(
                    "Category %s",
                    $faker->name
                ),
                $faker->text,
                true
            );
        }

        $request = $this->createRequest(
            '/api/integration/categories/bulk',
            'POST',
            true,
            $payload,
            [
                'Content-Type' => 'application/json',
            ]
        );

        $responsePayload = [];
        foreach ($payload as $category) {
            $id = $faker->uuid;
            $category->setHubeeId($id);
            $responsePayload[] = array_merge(
                $category->jsonSerialize(),
                [
                    'hubeeId' => $id
                ]
            );

            $requestLoadById = $this->createRequest(
                sprintf(
                    '/api/integration/categories/byId/%s',
                    rawurlencode($id)
                ),
                'GET',
                true,
            );

            $responseLoadById = $this->createResponse(
                200,
                [
                    'Content-Type' => 'application/json',
                ],
                $category->jsonSerialize()
            );

            $interactionLoadById[] = $this->createInteraction(
                "Get category by external id",
                $requestLoadById,
                $responseLoadById
            );
        }

        $response = $this->createResponse(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            $responsePayload
        );

        $interaction = $this->createInteraction(
            "Create bulk categories",
            $request,
            $response
        );

        $categoryResponse = $this->client->category()->createBulk($payload);

        $this->assertCount(
            count($responsePayload),
            $categoryResponse
        );

        foreach ($categoryResponse as $key => $category) {
            $this->assertEquals(
                $responsePayload[$key]['hubeeId'],
                $category->getHubeeId()
            );

            $this->assertEquals(
                $responsePayload[$key]['id'],
                $category->getId()
            );

            $this->assertEquals(
                $responsePayload[$key]['name'],
                $category->getName()
            );

            $this->assertEquals(
                $responsePayload[$key]['description'],
                $category->getDescription()
            );

            $this->assertEquals(
                $responsePayload[$key]['active'],
                $category->getActive()
            );
        }

        foreach ($interactionLoadById as $interactionLoad) {
            $interactionLoad->verify();
        }

        $interaction->verify();

        return $categoryResponse;
    }

    /**
     * @depends testCreateBulk
     * @param array $categories
     * @return void
     */
    public function testUpdateBulk(
        array $categories
    ): array {
        $faker = Factory::create();

        $payload = [];
        foreach ($categories as $category) {
            $originalName[$category->getId()] = $category->getName();
            $category->setName(
                sprintf(
                    "Category %s",
                    $faker->name
                )
            );
            $category->setHubeeId($faker->uuid);

            $payload[] = $category->jsonSerialize();
        }

        $request = $this->createRequest(
            '/api/integration/categories/bulk',
            'PUT',
            true,
            $payload,
            [
                'Content-Type' => 'application/json',
            ]
        );

        $responsePayload = [];
        foreach ($categories as $category) {
            $responsePayload[] = $category->jsonSerialize();

            $requestLoadById = $this->createRequest(
                sprintf(
                    '/api/integration/categories/byId/%s',
                    rawurlencode($category->getHubeeId())
                ),
                'GET',
                true,
            );

            $responseLoadById = $this->createResponse(
                200,
                [
                    'Content-Type' => 'application/json',
                ],
                $category->jsonSerialize()
            );

            $interactionLoadById[] = $this->createInteraction(
                "Get category by external id",
                $requestLoadById,
                $responseLoadById
            );
        }

        $response = $this->createResponse(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            $responsePayload
        );

        $interaction = $this->createInteraction(
            "Update bulk categories",
            $request,
            $response
        );

        $categoryResponse = $this->client->category()->updateBulk($categories);

        foreach ($categoryResponse as $key => $category) {
            $this->assertEquals(
                $responsePayload[$key]['hubeeId'],
                $category->getHubeeId()
            );

            $this->assertEquals(
                $responsePayload[$key]['id'],
                $category->getId()
            );

            $this->assertEquals(
                $responsePayload[$key]['name'],
                $category->getName()
            );

            $this->assertEquals(
                $responsePayload[$key]['description'],
                $category->getDescription()
            );

            $this->assertEquals(
                $responsePayload[$key]['active'],
                $category->getActive()
            );

            $this->assertNotEquals(
                $originalName[$category->getId()],
                $category->getName()
            );
        }

        foreach ($interactionLoadById as $interactionLoad) {
            $interactionLoad->verify();
        }

        $interaction->verify();

        return $categoryResponse;
    }

    public function testGetById()
    {
        $faker = Factory::create();

        $id = $faker->uuid;

        $request = $this->createRequest(
            sprintf(
                '/api/integration/categories/byId/%s',
                rawurlencode($id)
            ),
            'GET',
            true,
        );

        $response = $this->createResponse(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            [
                'id' => $id,
                'name' => sprintf(
                    "Category %s",
                    $faker->name
                ),
                'description' => $faker->text,
                'active' => true,
                "enabledAutoIntegration" => false
            ]
        );

        $interaction = $this->createInteraction(
            "Get category by id",
            $request,
            $response
        );

        $categoryResponse = $this->client->category()->getById($id);

        $this->assertEquals(
            $id,
            $categoryResponse->getId()
        );

        $interaction->verify();

        return $categoryResponse;
    }

}
