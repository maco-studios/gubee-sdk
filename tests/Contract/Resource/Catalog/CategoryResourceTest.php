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

    public function testCreate()
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
    }

}
