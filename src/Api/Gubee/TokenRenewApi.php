<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Gubee;

use Gubee\SDK\Api\AbstractApi;
use Gubee\SDK\Gubee;
use Gubee\SDK\Interfaces\Gubee\TokenInterface;
use Gubee\SDK\Model\Gubee\Token;
use Laminas\Hydrator\Strategy\DateTimeFormatterStrategy;

class TokenRenewApi extends AbstractApi
{
    public function __construct(Gubee $client)
    {
        parent::__construct($client);
        $strategy = new DateTimeFormatterStrategy('Y-m-d\TH:i:s.v');
        $this->hydrator->addStrategy(
            'validity',
            $strategy
        );
    }

    public function revalidate(string $token): TokenInterface
    {
        $response = $this->post(
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
        $token    = $this->getHydrator()->hydrate($response, new Token());
        return $token;
    }
}
