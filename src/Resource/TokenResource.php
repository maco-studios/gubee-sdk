<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

use Gubee\SDK\Model\Token;

use function print_r;

class TokenResource extends AbstractResource
{
    public function renew(string $token): Token
    {
        $response = $this->postForm(
            '/integration/tokens/revalidate/apitoken',
            $token
        );

        print_r($response);
        return $this->client->getServiceProvider()->create(
            Token::class,
            $response
        );
    }
}
