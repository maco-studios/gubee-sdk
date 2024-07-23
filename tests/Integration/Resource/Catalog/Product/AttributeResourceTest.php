<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration\Resource\Catalog\Product;

use Faker\Factory;
use Gubee\SDK\Enum\Catalog\Product\Attribute\AttrTypeEnum;
use Gubee\SDK\Model\Catalog\Product\Attribute;
use Gubee\SDK\Tests\Integration\AbstractIntegration;
use PHPUnit\Framework\TestCase;

class AttributeResourceTest extends AbstractIntegration
{
    public function testCreate(): Attribute
    {
        $faker = Factory::create();
        $attribute = new Attribute(
            AttrTypeEnum::TEXT,
            $faker->uuid,
            $faker->uuid,
            $faker->uuid,
            [
                $faker->word,
            ],
            true,
            true
        );

        $attributeResponse = $this->getClient()->attribute()->create($attribute);

        $this->assertInstanceOf(Attribute::class, $attributeResponse);
        $this->assertEquals($attribute->getId(), $attributeResponse->getId());
        $this->assertEquals($attribute->getLabel(), $attributeResponse->getLabel());
        $this->assertEquals($attribute->getOptions(), $attributeResponse->getOptions());
        $this->assertEquals($attribute->getRequired(), $attributeResponse->getRequired());
        return $attributeResponse;
    }

    /**
     * @depends testCreate
     *
     * @param \Gubee\SDK\Model\Catalog\Product\Attribute $attribute
     * @return \Gubee\SDK\Model\Catalog\Product\Attribute
     */
    public function testGetByExternalId(Attribute $attribute): Attribute
    {
        $attributeResponse = $this->getClient()->attribute()->getByExternalId($attribute->getId());
        $this->assertInstanceOf(Attribute::class, $attributeResponse);
        $this->assertEquals($attribute->getId(), $attributeResponse->getId());
        $this->assertEquals($attribute->getLabel(), $attributeResponse->getLabel());
        $this->assertEquals($attribute->getOptions(), $attributeResponse->getOptions());
        $this->assertEquals($attribute->getRequired(), $attributeResponse->getRequired());
        return $attributeResponse;
    }

    /**
     * @depends testGetByExternalId
     * @return \Gubee\SDK\Model\Catalog\Product\Attribute
     */
    public function testUpdate(Attribute $attribute): Attribute
    {
        $originalName = $attribute->getName();
        $attribute->setName($originalName . ' updated');

        $attributeResponse = $this->getClient()->attribute()->update(
            $attribute->getId(),
            $attribute
        );
        $this->assertInstanceOf(Attribute::class, $attributeResponse);
        $this->assertEquals($attribute->getId(), $attributeResponse->getId());
        $this->assertEquals($attribute->getLabel(), $attributeResponse->getLabel());
        $this->assertEquals($attribute->getOptions(), $attributeResponse->getOptions());
        $this->assertEquals($attribute->getRequired(), $attributeResponse->getRequired());
        $this->assertNotEquals($originalName, $attributeResponse->getName());
        return $attributeResponse;
    }

    public function testBulkCreate(): array
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $attributes[] = new Attribute(
                AttrTypeEnum::TEXT,
                $faker->uuid,
                $faker->uuid,
                $faker->uuid,
                [
                    $faker->word,
                ],
                true,
                true
            );
        }

        $attributeResponse = $this->getClient()->attribute()->bulkCreate($attributes);
        $this->assertCount(10, $attributeResponse);
        foreach ($attributeResponse as $attribute) {
            $this->assertInstanceOf(Attribute::class, $attribute);
        }

        return $attributeResponse;
    }

    /**
     * @depends testBulkCreate
     */
    public function testBulkUpdate(array $attributes): array
    {
        foreach ($attributes as $attribute) {
            $names[] = $attribute->getName();
            $attribute->setName($attribute->getName() . ' updated');
        }

        $attributeResponse = $this->getClient()->attribute()->bulkUpdate($attributes);
        $this->assertCount(10, $attributeResponse);
        foreach ($attributeResponse as $key => $attribute) {
            $this->assertInstanceOf(Attribute::class, $attribute);
            $this->assertNotEquals($names[$key], $attribute->getName());
        }

        return $attributeResponse;
    }

    /**
     * @depends testCreate
     */
    public function testGetById(
        Attribute $attribute
    ): Attribute {
        $attributeResponse = $this->getClient()->attribute()->getById($attribute->getHubeeId());
        $this->assertInstanceOf(Attribute::class, $attributeResponse);
        $this->assertEquals($attribute->getId(), $attributeResponse->getId());
        $this->assertEquals($attribute->getLabel(), $attributeResponse->getLabel());
        $this->assertEquals($attribute->getOptions(), $attributeResponse->getOptions());
        $this->assertEquals($attribute->getRequired(), $attributeResponse->getRequired());
        return $attributeResponse;
    }

    public function testGetByName(
    ): Attribute {
        $faker = Factory::create();
        $attribute = new Attribute(
            AttrTypeEnum::TEXT,
            $faker->uuid,
            $faker->uuid,
            $faker->uuid,
            [
                $faker->word,
            ],
            true,
            true
        );

        $response = $this->getClient()->attribute()->create($attribute);

        $attributeResponse = $this->getClient()->attribute()->getByName($response->getName());
        $this->assertInstanceOf(Attribute::class, $attributeResponse);
        $this->assertEquals($attribute->getId(), $attributeResponse->getId());
        $this->assertEquals($attribute->getLabel(), $attributeResponse->getLabel());
        $this->assertEquals($attribute->getOptions(), $attributeResponse->getOptions());
        $this->assertEquals($attribute->getRequired(), $attributeResponse->getRequired());
        return $attributeResponse;
    }

    public function testUpdateByName(
    ) {
        $faker = Factory::create();
        $attribute = new Attribute(
            AttrTypeEnum::TEXT,
            $faker->uuid,
            $faker->uuid,
            $faker->uuid,
            [
                $faker->word,
            ],
            true,
            true
        );

        $this->getClient()->attribute()->create($attribute);
        $originalName = $attribute->getName();
        $attribute->setName($originalName . ' updated');

        $attributeResponse = $this->getClient()->attribute()->updateByName($originalName, $attribute);
        $this->assertInstanceOf(Attribute::class, $attributeResponse);
        $this->assertEquals($attribute->getId(), $attributeResponse->getId());
        $this->assertEquals($attribute->getLabel(), $attributeResponse->getLabel());
        $this->assertEquals($attribute->getOptions(), $attributeResponse->getOptions());
        $this->assertEquals($attribute->getRequired(), $attributeResponse->getRequired());
        $this->assertNotEquals($originalName, $attributeResponse->getName());
    }


}
