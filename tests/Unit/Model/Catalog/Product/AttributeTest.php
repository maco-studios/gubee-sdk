<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Unit\Model\Catalog\Product;

use PHPUnit\Framework\TestCase;
use Gubee\SDK\Model\Catalog\Product\Attribute;

/**
 * @covers \Gubee\SDK\Model\Catalog\Product\Attribute
 */
class AttributeTest extends TestCase
{
    public function testGetters()
    {
        $attrType = 'attrType';
        $hubeeId = 'hubeeId';
        $id = 'id';
        $label = 'label';
        $name = 'name';
        $options = ['option1', 'option2'];
        $required = true;
        $variant = false;

        $attribute = new Attribute($attrType, $hubeeId, $id, $label, $name, $options, $required, $variant);

        $this->assertEquals($attrType, $attribute->getAttrType());
        $this->assertEquals($hubeeId, $attribute->getHubeeId());
        $this->assertEquals($id, $attribute->getId());
        $this->assertEquals($label, $attribute->getLabel());
        $this->assertEquals($name, $attribute->getName());
        $this->assertEquals($options, $attribute->getOptions());
        $this->assertEquals($required, $attribute->getRequired());
        $this->assertEquals($variant, $attribute->getVariant());
    }

    public function testSetters()
    {
        $attribute = new Attribute('', '', '', '', '', []);

        $attrType = 'attrType';
        $hubeeId = 'hubeeId';
        $id = 'id';
        $label = 'label';
        $name = 'name';
        $options = ['option1', 'option2'];
        $required = true;
        $variant = false;

        $attribute->setAttrType($attrType);
        $attribute->setHubeeId($hubeeId);
        $attribute->setId($id);
        $attribute->setLabel($label);
        $attribute->setName($name);
        $attribute->setOptions($options);
        $attribute->setRequired($required);
        $attribute->setVariant($variant);

        $this->assertEquals($attrType, $attribute->getAttrType());
        $this->assertEquals($hubeeId, $attribute->getHubeeId());
        $this->assertEquals($id, $attribute->getId());
        $this->assertEquals($label, $attribute->getLabel());
        $this->assertEquals($name, $attribute->getName());
        $this->assertEquals($options, $attribute->getOptions());
        $this->assertEquals($required, $attribute->getRequired());
        $this->assertEquals($variant, $attribute->getVariant());
    }

    public function testFromJson()
    {
        $data = [
            'attrType' => 'attrType',
            'hubeeId' => 'hubeeId',
            'id' => 'id',
            'label' => 'label',
            'name' => 'name',
            'options' => ['option1', 'option2'],
            'required' => true,
            'variant' => false,
        ];

        $attribute = Attribute::fromJson($data);

        $this->assertEquals($data['attrType'], $attribute->getAttrType());
        $this->assertEquals($data['hubeeId'], $attribute->getHubeeId());
        $this->assertEquals($data['id'], $attribute->getId());
        $this->assertEquals($data['label'], $attribute->getLabel());
        $this->assertEquals($data['name'], $attribute->getName());
        $this->assertEquals($data['options'], $attribute->getOptions());
        $this->assertEquals($data['required'], $attribute->getRequired());
        $this->assertEquals($data['variant'], $attribute->getVariant());
    }
}
