<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource\Catalog;

use Gubee\SDK\Model\Catalog\Brand;
use Gubee\SDK\Tests\Contract\Resource\AbstractResource;
use PHPUnit\Framework\TestCase;

class BrandResourceTest extends AbstractResource
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->token = 'apitoken';
        $this->client->authenticate($this->token);
    }

    public function testCreate()
    {
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            '/api/integration/brands',
            'POST',
            true,
            $payload,
            [
                'Content-Type' => 'application/json'
            ]
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Create brand',
            $request,
            $response
        );

        $brand = new Brand(
            'string',
            'string',
            'string',
            'string'
        );

        $brand = $this->client->brand()->create($brand);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();
    }

    public function testGetByExternalId()
    {

        $externalId = 'string';
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            sprintf(
                "/api/integration/brands/%s",
                rawurlencode($externalId)
            ),
            'GET',
            true
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Get brand by external id',
            $request,
            $response
        );

        $brand = $this->client->brand()->getByExternalId($externalId);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();
    }

    public function testUpdateByExternalId()
    {
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $externalId = 'string';

        $request = $this->createRequest(
            '/api/integration/brands/byExternalId/' . $externalId,
            'PUT',
            true,
            $payload,
            [
                'Content-Type' => 'application/json'
            ]
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Update brand by external id',
            $request,
            $response
        );

        $brand = new Brand(
            'string',
            'string',
            'string',
            'string'
        );

        $brand = $this->client->brand()->updateByExternalId($externalId, $brand);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();

    }

    public function testGetById()
    {
        $id = 'string';
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            '/api/integration/brands/byId/' . $id,
            'GET',
            true
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Get brand by id',
            $request,
            $response
        );

        $brand = $this->client->brand()->getById($id);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();
    }

    public function testGetByName()
    {
        $name = 'string';
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            '/api/integration/brands/byName',
            'GET',
            true,
            [],
            [],
            [
                'name' => $name
            ]
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Get brand by name',
            $request,
            $response
        );

        $brand = $this->client->brand()->getByName($name);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();

    }

    public function testGetByNameV2()
    {
        $name = 'string';
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            '/api/integration/brands/byName',
            'POST',
            true,
            ['name' => $name],
            [
                'Content-Type' => 'application/json'
            ]
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Get brand by name v2',
            $request,
            $response
        );

        $brand = $this->client->brand()->getByNameV2($name);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();
    }

    public function testUpdateByName()
    {
        $name = 'string';
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            '/api/integration/brands/byName',
            'PUT',
            true,
            [
                'name' => $name
            ],
            [
                'Content-Type' => 'application/json'
            ]
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Update brand by name',
            $request,
            $response
        );

        $brand = new Brand(
            'string',
            'string',
            'string',
            'string'
        );

        $brand = $this->client->brand()->updateByName($name, $brand);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();
    }

    public function testUpdateByNameV2()
    {
        $name = 'string';
        $payload = [
            "description" => "string",
            "hubeeId" => "string",
            "id" => "string",
            "name" => "string"
        ];

        $request = $this->createRequest(
            '/api/integration/brands/v2/byName',
            'PUT',
            true,
            [
                'name' => $name
            ],
            [
                'Content-Type' => 'application/json'
            ]
        );

        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            $payload
        );

        $interaction = $this->createInteraction(
            'Update brand by name v2',
            $request,
            $response
        );

        $brand = new Brand(
            'string',
            'string',
            'string',
            'string'
        );

        $brand = $this->client->brand()->updateByNameV2($name, $brand);

        $this->assertEquals(
            $payload['description'],
            $brand->getDescription(),
            'Brand description does not match'
        );

        $this->assertEquals(
            $payload['hubeeId'],
            $brand->getHubeeId(),
            'Brand hubeeId does not match'
        );

        $this->assertEquals(
            $payload['id'],
            $brand->getId(),
            'Brand id does not match'
        );

        $this->assertEquals(
            $payload['name'],
            $brand->getName(),
            'Brand name does not match'
        );

        $interaction->verify();

    }

}
