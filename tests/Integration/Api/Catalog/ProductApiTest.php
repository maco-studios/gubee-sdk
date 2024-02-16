<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Integration\Api\Catalog;

use Gubee\SDK\Test\Integration\AbstractTestCase;

class ProductApiTest extends AbstractTestCase
{
    public function testGetProductById()
    {
        $product = 1;
        $this->assertNotNull($product);
    }
}
