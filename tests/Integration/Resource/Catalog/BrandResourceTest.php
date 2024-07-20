<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration\Resource\Catalog;

use Gubee\SDK\Model\Catalog\Brand;
use Gubee\SDK\Tests\Integration\AbstractIntegration;

class BrandResourceTest extends AbstractIntegration
{

    public function testCreate(): Brand
    {
        $faker = \Faker\Factory::create();
        $brand = new Brand(
            $faker->uuid,
            $faker->name,
            $faker->text
        );

        $brandResponse = $this->getClient()->brand()->create($brand);

        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertEquals($brand->getId(), $brandResponse->getId());
        $this->assertEquals($brand->getName(), $brandResponse->getName());
        $this->assertEquals($brand->getDescription(), $brandResponse->getDescription());
        $this->assertNotNull($brandResponse->getHubeeId());
        return $brandResponse;
    }

    /**
     * @depends testCreate
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testGetByExternalId(
        Brand $brand
    ): Brand {
        $brandResponse = $this->getClient()->brand()->getByExternalId($brand->getId());

        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertEquals($brand->getId(), $brandResponse->getId());
        $this->assertEquals($brand->getName(), $brandResponse->getName());
        $this->assertEquals($brand->getDescription(), $brandResponse->getDescription());
        $this->assertEquals($brand->getHubeeId(), $brandResponse->getHubeeId());
        return $brandResponse;
    }

    /**
     * @depends testGetByExternalId
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testUpdateByExternalId(
        Brand $brand
    ): Brand {
        $faker = \Faker\Factory::create();
        $brandOriginal = clone $brand;
        $brand->setName($faker->name);
        $brand->setDescription($faker->text);

        $brandResponse = $this->getClient()->brand()->updateByExternalId($brand->getId(), $brand);

        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        return $brandResponse;

    }

    /**
     * @depends testUpdateByExternalId
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testGetById(
        Brand $brand
    ): Brand {
        $brandResponse = $this->getClient()->brand()->getById($brand->getHubeeId());
        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertEquals($brand->getId(), $brandResponse->getId());
        $this->assertEquals($brand->getName(), $brandResponse->getName());
        $this->assertEquals($brand->getDescription(), $brandResponse->getDescription());
        $this->assertEquals($brand->getHubeeId(), $brandResponse->getHubeeId());
        return $brandResponse;
    }

    /**
     * @depends testGetById
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testGetByName(
        Brand $brand
    ): Brand {
        $brandResponse = $this->getClient()->brand()->getByName($brand->getName());
        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertEquals($brand->getId(), $brandResponse->getId());
        $this->assertEquals($brand->getName(), $brandResponse->getName());
        $this->assertEquals($brand->getDescription(), $brandResponse->getDescription());
        $this->assertEquals($brand->getHubeeId(), $brandResponse->getHubeeId());
        return $brandResponse;
    }

    /**
     * @depends testGetByName
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testGetByNameV2(
        Brand $brand
    ): Brand {
        $brandResponse = $this->getClient()->brand()->getByNameV2($brand->getName());
        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertEquals($brand->getId(), $brandResponse->getId());
        $this->assertEquals($brand->getName(), $brandResponse->getName());
        $this->assertEquals($brand->getDescription(), $brandResponse->getDescription());
        $this->assertEquals($brand->getHubeeId(), $brandResponse->getHubeeId());
        return $brandResponse;
    }


    /**
     * @depends testGetByName
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testUpdateByName(
        Brand $brand
    ): Brand {
        $faker = \Faker\Factory::create();
        $name = $brand->getName();
        $brandOriginal = clone $brand;
        $brand->setName($faker->name);
        $brand->setDescription($faker->text);

        $brandResponse = $this->getClient()->brand()->updateByName($name, $brand);

        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        $this->assertNotEquals(
            $brandOriginal->getName(),
            $brandResponse->getName()
        );
        return $brandResponse;

    }

    /**
     * @depends testGetByName
     * @param \Gubee\SDK\Model\Catalog\Brand $brand
     * @return \Gubee\SDK\Model\Catalog\Brand
     */
    public function testUpdateByNameV2(
        Brand $brand
    ): Brand {

        $faker = \Faker\Factory::create();
        $originalDescription = $brand->getDescription();
        $brand->setDescription($faker->text);
        $brandResponse = $this->getClient()->brand()->updateByNameV2($brand);

        $this->assertInstanceOf(Brand::class, $brandResponse);
        $this->assertNotEquals(
            $originalDescription,
            $brandResponse->getDescription()
        );
        return $brandResponse;
    }

}
