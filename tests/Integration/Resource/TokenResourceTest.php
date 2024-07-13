<?php

declare(strict_types=1);

namespace Gubee\SDK\Tests\Integration\Resource;

use Gubee\SDK\Tests\Integration\AbstractIntegration;

class TokenResourceTest extends AbstractIntegration
{
    public function testRevalidate(): void
    {
        $this->revalidate();
    }
}
