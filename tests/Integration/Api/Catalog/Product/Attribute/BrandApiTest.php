<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Integration\Api\Catalog\Product\Attribute;

use Exception;
use Gubee\SDK\Model\Catalog\Product\Attribute\Brand;
use Gubee\SDK\Test\Integration\AbstractTestCase;

class BrandApiTest extends AbstractTestCase
{
    protected function setUp(): void
    {
        if (! $token = $this->getCache()->getItem('token')->get()) {
            throw new Exception('Token not found');
        }
        $this->getGubee()->authenticate($token->getToken());
    }

    /**
     * Create a brand
     *
     * @dataProvider providerBrand
     */
    public function testCreate(Brand $brand): void
    {
        $brand = $this->getGubee()->brand()->create($brand);
        $this->assertNotNull($brand);
    }

    /**
     * Load a brand by external ID
     *
     * @dataProvider providerBrand
     */
    public function testLoadByExternalId(Brand $brand): void
    {
        $brand       = $this->getGubee()->brand()->create($brand);
        $brandLoaded = $this->getGubee()->brand()->loadByExternalId($brand->getId());
        $this->assertNotNull($brand);
        $this->assertEquals($brand->getId(), $brandLoaded->getId());
        $this->assertEquals($brand->getName(), $brandLoaded->getName());
    }

    /**
     * Update a brand
     *
     * @dataProvider providerBrand
     */
    public function testUpdateBrand(Brand $brand): void
    {
        $createdBrand = $this->getGubee()->brand()->create($brand);
        $brand        = $this->getGubee()->brand()->loadByExternalId($createdBrand->getId());
        $brand->setName($this->getFaker()->name());
        $brand = $this->getGubee()->brand()->update($brand);
        $this->assertNotEquals(
            $createdBrand->getName(),
            $brand->getName(),
            'The brand was not updated'
        );
        $this->assertEquals(
            $createdBrand->getId(),
            $brand->getId()
        );
        $this->assertNotNull($brand);
    }

    /**
     * Load a brand by name
     *
     * @dataProvider providerBrand
     */
    public function testLoadByName(Brand $brand): void
    {
        $brand       = $this->getGubee()->brand()->create($brand);
        $brandLoaded = $this->getGubee()->brand()->loadByName($brand->getName());
        $this->assertNotNull($brand);
        $this->assertEquals($brand->getId(), $brandLoaded->getId());
        $this->assertEquals($brand->getName(), $brandLoaded->getName());
    }

    public function providerBrand(): array
    {
        $brand = new Brand();
        $brand->setName(
            $this->getFaker()->name()
        );
        return [[$brand]];
    }
}
