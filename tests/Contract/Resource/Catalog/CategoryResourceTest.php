<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource\Catalog;

use Gubee\SDK\Client;
use Gubee\SDK\Library\HttpClient\Exception\BadRequestException;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;
use Gubee\SDK\Model\Catalog\Category;
use Gubee\SDK\Model\Token;
use PHPUnit\Framework\TestCase;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use Gubee\SDK\Tests\Contract\Resource\AbstractResource;


class CategoryResourceTest extends AbstractResource
{

    public function testCreate()
    {
        $request = $this->createRequest(
            '/api/integration/categories',
            'POST'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "links": {
                    "empty": true
                },
                "name": "string",
                "parent": "string"
            }
            JSON, true)
        );

        $request = new ConsumerRequest();
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/categories');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('Create a category')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->category()->create(
            Category::fromJson(
                json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "name": "string",
                "parent": "string"
            }
            JSON, true)
            )
        );
        $this->assertInstanceOf(Category::class, $result);
        $builder->verify();
    }

    public function testGetByExternalId()
    {
        $externalId = 'abc123';

        $request = $this->createRequest(
            '/api/integration/categories/' . rawurlencode($externalId),
            'GET'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "links": {
                    "empty": true
                },
                "name": "string",
                "parent": "string"
            }
            JSON, true)
        );

        $request = new ConsumerRequest();
        $service = new Client();

        $request
            ->setMethod('GET')
            ->setPath('/api/integration/categories/' . rawurlencode($externalId));
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('Get category by externalId')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->category()->getByExternalId($externalId);
        $this->assertInstanceOf(Category::class, $result);
        $builder->verify();
    }

    public function testUpdateByExternalId()
    {
        $externalId = 'abc123';

        $request = $this->createRequest(
            '/api/integration/categories/' . rawurlencode($externalId),
            'PUT'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "links": {
                    "empty": true
                },
                "name": "string",
                "parent": "string"
            }
            JSON, true)
        );

        $request = new ConsumerRequest();
        $service = new Client();

        $request
            ->setMethod('PUT')
            ->setPath('/api/integration/categories/' . rawurlencode($externalId));
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('Update category by externalId')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->category()->updateByExternalId(
            $externalId,
            Category::fromJson(
                json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "name": "string",
                "parent": "string"
            }
            JSON, true)
            )
        );
        $this->assertInstanceOf(Category::class, $result);
        $builder->verify();
    }

    public function testCreateBulk()
    {
        $categories = [
            Category::fromJson(
                json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "name": "string",
                "parent": "string"
            }
            JSON, true)
            ),
            Category::fromJson(
                json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "name": "string",
                "parent": "string"
            }
            JSON, true)
            )
        ];

        $request = $this->createRequest(
            '/api/integration/categories/bulk',
            'POST'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_decode(<<<JSON
            [
                {
                    "active": true,
                    "description": "string",
                    "enabledAutoIntegration": true,
                    "hubeeId": "string",
                    "id": "string",
                    "links": {
                        "empty": true
                    },
                    "name": "string",
                    "parent": "string"
                },
                {
                    "active": true,
                    "description": "string",
                    "enabledAutoIntegration": true,
                    "hubeeId": "string",
                    "id": "string",
                    "links": {
                        "empty": true
                    },
                    "name": "string",
                    "parent": "string"
                }
            ]
            JSON, true)
        );

        $request = new ConsumerRequest();
        $service = new Client();

        $request
            ->setMethod('POST')
            ->setPath('/api/integration/categories/bulk');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('Create categories in bulk')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->category()->createBulk($categories);
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Category::class, $result[0]);
        $this->assertInstanceOf(Category::class, $result[1]);
        $builder->verify();
    }

    public function testUpdateBulk()
    {
        $categories = [
            Category::fromJson(
                json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "name": "string",
                "parent": "string"
            }
            JSON, true)
            ),
            Category::fromJson(
                json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "name": "string",
                "parent": "string"
            }
            JSON, true)
            )
        ];

        $request = $this->createRequest(
            '/api/integration/categories/bulk',
            'PUT'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_decode(<<<JSON
            [
                {
                    "active": true,
                    "description": "string",
                    "enabledAutoIntegration": true,
                    "hubeeId": "string",
                    "id": "string",
                    "links": {
                        "empty": true
                    },
                    "name": "string",
                    "parent": "string"
                },
                {
                    "active": true,
                    "description": "string",
                    "enabledAutoIntegration": true,
                    "hubeeId": "string",
                    "id": "string",
                    "links": {
                        "empty": true
                    },
                    "name": "string",
                    "parent": "string"
                }
            ]
            JSON, true)
        );

        $request = new ConsumerRequest();
        $service = new Client();

        $request
            ->setMethod('PUT')
            ->setPath('/api/integration/categories/bulk');
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('Update categories in bulk')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->category()->updateBulk($categories);
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Category::class, $result[0]);
        $this->assertInstanceOf(Category::class, $result[1]);
        $builder->verify();
    }

    public function testGetById()
    {
        $id = 'abc123';

        $request = $this->createRequest(
            '/api/integration/categories/byId/' . rawurlencode($id),
            'GET'
        );
        $response = $this->createResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_decode(<<<JSON
            {
                "active": true,
                "description": "string",
                "enabledAutoIntegration": true,
                "hubeeId": "string",
                "id": "string",
                "links": {
                    "empty": true
                },
                "name": "string",
                "parent": "string"
            }
            JSON, true)
        );

        $request = new ConsumerRequest();
        $service = new Client();

        $request
            ->setMethod('GET')
            ->setPath('/api/integration/categories/byId/' . rawurlencode($id));
        $config = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);

        $builder
            ->uponReceiving('Get category by id')
            ->with($request)
            ->willRespondWith($response);

        $service->setUrl((string) $config->getBaseUri()->withPath(''));

        $result = $service->category()->getById($id);
        $this->assertInstanceOf(Category::class, $result);
        $builder->verify();
    }


}
