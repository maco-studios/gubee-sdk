<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

use Gubee\SDK\Model\Token;

use function print_r;

class TokenResource extends AbstractResource
{
    public function revalidate(string $token): Token
    {
        $response = $this->postForm(
            '/integration/tokens/revalidate/apitoken',
            $token
        );

        return $this->client->getServiceProvider()->create(
            Token::class,
            $response
        );
    }
}
