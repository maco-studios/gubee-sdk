<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Unit\Model\Catalog;

use Gubee\SDK\Model\Catalog\Category;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Category
 * 
 * @covers \Gubee\SDK\Model\Catalog\Category
 */
class CategoryTest extends TestCase
{

    public function testGetterSetters()
    {
        $category = new Category(
            true,
            'description',
            'name',
            'id',
            true,
            'parent',
            'hubeeId'
        );

        $category->setActive(false);
        $this->assertFalse($category->getActive(), 'Failed to set active status');
        $category->setDescription('new description');
        $this->assertEquals('new description', $category->getDescription(), 'Failed to set description');
        $category->setName('new name');
        $this->assertEquals('new name', $category->getName(), 'Failed to set name');
        $category->setId('new id');
        $this->assertEquals('new id', $category->getId(), 'Failed to set ID');
        $category->setEnabledAutoIntegration(false);
        $this->assertFalse($category->getEnabledAutoIntegration(), 'Failed to set enabled auto integration status');
        $category->setParent('new parent');
        $this->assertEquals('new parent', $category->getParent(), 'Failed to set parent');
        $category->setHubeeId('new hubeeId');
        $this->assertEquals('new hubeeId', $category->getHubeeId(), 'Failed to set hubee ID');
    }

    public function testFromJson()
    {
        $array = [
            'active' => true,
            'description' => 'description',
            'name' => 'name',
            'id' => 'id',
            'enabledAutoIntegration' => true,
            'parent' => 'parent',
            'hubeeId' => 'hubeeId'
        ];


        $category = Category::fromJson($array);
        $this->assertEquals($array['active'], $category->getActive(), 'Failed to assert active');
        $this->assertEquals($array['description'], $category->getDescription(), 'Failed to assert description');
        $this->assertEquals($array['name'], $category->getName(), 'Failed to assert name');
        $this->assertEquals($array['id'], $category->getId(), 'Failed to assert ID');
        $this->assertEquals($array['enabledAutoIntegration'], $category->getEnabledAutoIntegration(), 'Failed to assert enabled auto integration');
        $this->assertEquals($array['parent'], $category->getParent(), 'Failed to assert parent');
        $this->assertEquals($array['hubeeId'], $category->getHubeeId(), 'Failed to assert hubee ID');
    }


}
