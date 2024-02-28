<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

class TokenResource extends AbstractResource
{
    public function revalidate(string $token): array
    {
        return $this->post(
            '/integration/tokens/revalidate/apitoken',
            [],
            [
                'Content-Type' => 'application/hal+json',
                'Accept'       => 'application/hal+json',
            ],
            [],
            [],
            $token
        );
    }
}
