<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

use Gubee\SDK\Library\HttpClient\ResponseMediator;
use Gubee\SDK\Model\Token;

class TokenResource extends AbstractResource
{
    public function revalidate(string $token): Token
    {
        $response = $this->post(
            '/integration/tokens/revalidate/apitoken',
            [
                'token' => $token
            ],
            [
                ResponseMediator::CONTENT_TYPE_HEADER => 'multipart/form-data'
            ]
        );

        return Token::fromJson($response);
    }
}
