<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Contract\Resource\Catalog\Product;

use Faker\Factory;
use Gubee\SDK\Enum\Catalog\Product\Attribute\AttrTypeEnum;
use Gubee\SDK\Model\Catalog\Product\Attribute;
use Gubee\SDK\Tests\Contract\Resource\AbstractResource;

/**
 * @covers \Gubee\SDK\Resource\Catalog\AttributeResource
 */
class AttributeResourceTest extends AbstractResource
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
            'attrType' => 'text',
            'hubeeId' => '123',
            'id' => '123',
            'label' => 'test',
            'name' => 'test',
            'options' => ['test'],
            'required' => true,
            'variant' => true
        ];
        $request = $this->createRequest(
            '/api/integration/attributes',
            'POST',
            true,
            $payload
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $payload);

        $attribute = new Attribute(
            AttrTypeEnum::fromValue($payload['attrType']),
            $payload['hubeeId'],
            $payload['id'],
            $payload['label'],
            $payload['name'],
            $payload['options'],
            $payload['required'],
            $payload['variant']
        );
        $interaction = $this->createInteraction(
            "Create attribute",
            $request,
            $response
        );

        $attribute = $this->getClient()->attribute()->create($attribute);

        $this->assertEquals($attribute->getAttrType(), $payload['attrType']);
        $this->assertEquals($attribute->getHubeeId(), $payload['hubeeId']);
        $this->assertEquals($attribute->getId(), $payload['id']);
        $this->assertEquals($attribute->getLabel(), $payload['label']);
        $this->assertEquals($attribute->getName(), $payload['name']);
        $this->assertEquals($attribute->getOptions(), $payload['options']);
        $this->assertEquals($attribute->getRequired(), $payload['required']);
        $this->assertEquals($attribute->getVariant(), $payload['variant']);

        $interaction->verify();

        return $attribute;
    }

    public function testGetByExternalId()
    {
        $payload = ['attrType' => 'text', 'hubeeId' => '123', 'id' => '123', 'label' => 'test', 'name' => 'test', 'options' => ['test'], 'required' => true, 'variant' => true];
        $externalId = '123';

        $request = $this->createRequest(
            sprintf('/api/integration/attributes/%s', $externalId),
            'GET',
            true
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $payload);

        $interaction = $this->createInteraction(
            "Get attribute",
            $request,
            $response
        );

        $attribute = $this->getClient()->attribute()->getByExternalId($externalId);

        $this->assertEquals($attribute->getAttrType(), $payload['attrType']);
        $this->assertEquals($attribute->getHubeeId(), $payload['hubeeId']);
        $this->assertEquals($attribute->getId(), $payload['id']);
        $this->assertEquals($attribute->getLabel(), $payload['label']);
        $this->assertEquals($attribute->getName(), $payload['name']);
        $this->assertEquals($attribute->getOptions(), $payload['options']);
        $this->assertEquals($attribute->getRequired(), $payload['required']);
        $this->assertEquals($attribute->getVariant(), $payload['variant']);

        $interaction->verify();

        return $attribute;
    }

    public function testUpdate()
    {
        $payload = ['attrType' => 'text', 'hubeeId' => '123', 'id' => '123', 'label' => 'test', 'name' => 'test', 'options' => ['test'], 'required' => true, 'variant' => true];
        $externalId = '123';

        $request = $this->createRequest(
            sprintf('/api/integration/attributes/%s', $externalId),
            'PUT',
            true,
            $payload
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $payload);

        $interaction = $this->createInteraction(
            "Update attribute",
            $request,
            $response
        );

        $attribute = $this->getClient()->attribute()->update(
            $externalId,
            new Attribute(
                $payload['attrType'],
                $payload['hubeeId'],
                $payload['id'],
                $payload['label'],
                $payload['name'],
                $payload['options'],
                $payload['required'],
                $payload['variant']
            )
        );

        $this->assertEquals($attribute->getAttrType(), $payload['attrType']);
        $this->assertEquals($attribute->getHubeeId(), $payload['hubeeId']);
        $this->assertEquals($attribute->getId(), $payload['id']);
        $this->assertEquals($attribute->getLabel(), $payload['label']);
        $this->assertEquals($attribute->getName(), $payload['name']);
        $this->assertEquals($attribute->getOptions(), $payload['options']);
        $this->assertEquals($attribute->getRequired(), $payload['required']);
        $this->assertEquals($attribute->getVariant(), $payload['variant']);

        $interaction->verify();

        return $attribute;
    }

    public function testBulkCreate()
    {
        $faker = Factory::create();
        $payload = [];
        for ($i = 0; $i < 10; $i++) {
            $attribute = new Attribute($faker->word, $faker->uuid, $faker->word, $faker->word, $faker->word, [$faker->word], $faker->boolean, $faker->boolean);
            $requestGetByIds[$attribute->getHubeeId()] = $this->createRequest(
                sprintf('/api/integration/attributes/byId/%s', $attribute->getHubeeId()),
                'GET',
                true
            );

            $responseGetByIds[$attribute->getHubeeId()] = $this->createResponse(200, [
                'Content-Type' => 'application/json',
            ], $attribute->jsonSerialize());
            $interactionGetByIds[$attribute->getHubeeId()] = $this->createInteraction(
                "Get attribute",
                $requestGetByIds[$attribute->getHubeeId()],
                $responseGetByIds[$attribute->getHubeeId()]
            );
            $payload[] = $attribute;
        }

        $request = $this->createRequest(
            '/api/integration/attributes/bulk',
            'POST',
            true,
            $payload
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $payload);

        $interaction = $this->createInteraction(
            "Bulk create attribute",
            $request,
            $response
        );

        $attributes = $this->getClient()->attribute()->bulkCreate($payload);

        $this->assertCount(10, $attributes);

        $interaction->verify();

        foreach ($interactionGetByIds as $interactionGetById) {
            $interactionGetById->verify();
        }

    }

    public function testBulkUpdate()
    {
        $faker = Factory::create();
        $payload = [];
        for ($i = 0; $i < 10; $i++) {
            $attribute = new Attribute($faker->word, $faker->uuid, $faker->word, $faker->word, $faker->word, [$faker->word], $faker->boolean, $faker->boolean);
            $requestGetByIds[$attribute->getHubeeId()] = $this->createRequest(
                sprintf('/api/integration/attributes/byId/%s', $attribute->getHubeeId()),
                'GET',
                true
            );

            $responseGetByIds[$attribute->getHubeeId()] = $this->createResponse(200, [
                'Content-Type' => 'application/json',
            ], $attribute->jsonSerialize());
            $interactionGetByIds[$attribute->getHubeeId()] = $this->createInteraction(
                "Get attribute",
                $requestGetByIds[$attribute->getHubeeId()],
                $responseGetByIds[$attribute->getHubeeId()]
            );
            $payload[] = $attribute;
        }

        $request = $this->createRequest(
            '/api/integration/attributes/bulk',
            'PUT',
            true,
            $payload
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $payload);

        $interaction = $this->createInteraction(
            "Bulk update attribute",
            $request,
            $response
        );

        $attributes = $this->getClient()->attribute()->bulkUpdate($payload);

        $this->assertCount(10, $attributes);

        $interaction->verify();

        foreach ($interactionGetByIds as $interactionGetById) {
            $interactionGetById->verify();
        }

    }

    public function testGetById()
    {
        $faker = Factory::create();
        $attribute = new Attribute($faker->word, $faker->uuid, $faker->word, $faker->word, $faker->word, [$faker->word], $faker->boolean, $faker->boolean);
        $request = $this->createRequest(
            sprintf('/api/integration/attributes/byId/%s', rawurlencode($attribute->getHubeeId())),
            'GET',
            true
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $attribute->jsonSerialize());

        $interaction = $this->createInteraction(
            "Get attribute",
            $request,
            $response
        );

        $attribute = $this->getClient()->attribute()->getById($attribute->getHubeeId());

        $this->assertEquals($attribute->getHubeeId(), $attribute->getHubeeId());

        $interaction->verify();
    }

    public function testGetByName()
    {
        $faker = Factory::create();
        $attribute = new Attribute($faker->word, $faker->uuid, $faker->word, $faker->word, $faker->word, [$faker->word], $faker->boolean, $faker->boolean);
        $request = $this->createRequest(
            sprintf('/api/integration/attributes/byName/%s', urlencode($attribute->getName())),
            'GET',
            true
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $attribute->jsonSerialize());

        $interaction = $this->createInteraction(
            "Get attribute",
            $request,
            $response
        );

        $attribute = $this->getClient()->attribute()->getByName($attribute->getName());

        $this->assertEquals($attribute->getHubeeId(), $attribute->getHubeeId());

        $interaction->verify();

    }

    public function testUpdateByName()
    {
        $faker = Factory::create();
        $attribute = new Attribute($faker->word, $faker->uuid, $faker->word, $faker->word, $faker->word, [$faker->word], $faker->boolean, $faker->boolean);
        $request = $this->createRequest(
            sprintf('/api/integration/attributes/byName/%s', urlencode($attribute->getName())),
            'PUT',
            true
        );

        $response = $this->createResponse(200, [
            'Content-Type' => 'application/json',
        ], $attribute->jsonSerialize());

        $interaction = $this->createInteraction(
            "Update attribute",
            $request,
            $response
        );

        $attribute = $this->getClient()->attribute()->updateByName($attribute->getName(), $attribute);

        $this->assertEquals($attribute->getHubeeId(), $attribute->getHubeeId());

        $interaction->verify();
    }

}
