<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Unit\Model\Catalog;

use Gubee\SDK\Model\Catalog\Brand;
use PHPUnit\Framework\TestCase;

class BrandTest extends TestCase
{

    public function testSetterGetters()
    {
        $faker = \Faker\Factory::create();

        $payload = [
            'name' => $faker->name,
            'hubeeId' => $faker->uuid,
            'description' => $faker->text,
            'id' => $faker->uuid,
        ];

        $brand = new Brand(
            $payload['id'],
            $payload['name'],
            $payload['description'],
            $payload['hubeeId'],
        );

        $this->assertEquals($payload['name'], $brand->getName());
        $this->assertEquals($payload['hubeeId'], $brand->getHubeeId());
        $this->assertEquals($payload['description'], $brand->getDescription());
        $this->assertEquals($payload['id'], $brand->getId());

        /** change values to test setters */
        $payload = [
            'name' => $faker->name,
            'hubeeId' => $faker->uuid,
            'description' => $faker->text,
            'id' => $faker->uuid,
        ];

        $brand->setName($payload['name']);
        $brand->setHubeeId($payload['hubeeId']);
        $brand->setDescription($payload['description']);
        $brand->setId($payload['id']);

        $this->assertEquals($payload['name'], $brand->getName());
        $this->assertEquals($payload['hubeeId'], $brand->getHubeeId());
        $this->assertEquals($payload['description'], $brand->getDescription());
        $this->assertEquals($payload['id'], $brand->getId());
    }

}
