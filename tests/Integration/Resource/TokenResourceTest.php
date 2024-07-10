<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration\Resource;

use Gubee\SDK\Tests\Integration\AbstractIntegration;
use PHPUnit\Framework\TestCase;

class TokenResourceTest extends AbstractIntegration
{

    public function testRevalidate()
    {
        $this->revalidate();
    }

}
