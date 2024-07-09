<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

use Gubee\SDK\Library\HttpClient\ResponseMediator;
use Gubee\SDK\Model\Token;
use Gubee\SDK\Library\HttpClient\Exception\BadRequestException;
use Gubee\SDK\Library\HttpClient\Exception\ForbiddenException;
use Gubee\SDK\Library\HttpClient\Exception\NotFoundException;
use Gubee\SDK\Library\HttpClient\Exception\UnauthorizedException;

class TokenResource extends AbstractResource
{

    /**
     * Revalidate a token.
     * The lifetime of token is 1 hour, so it is necessary
     * to keep the root token or the new token renewed in case it receives a return 403 renew the token again,
     * remembering that this API does not allow renewing tokens that are not expired, or tokens that have just been renewed.
     * 
     * @param string $token
     * @return \Gubee\SDK\Model\Token
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws NotFoundException
     */
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
