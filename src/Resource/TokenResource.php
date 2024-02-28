<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource;

use Gubee\SDK\Api\Gubee\TokenInterface;
use Gubee\SDK\Gubee;
use Gubee\SDK\Model\Gubee\Token;
use Laminas\Hydrator\Strategy\DateTimeFormatterStrategy;

class TokenResource extends AbstractResource
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

        return $this->hydrator->hydrate($response, new Token());
    }
}
