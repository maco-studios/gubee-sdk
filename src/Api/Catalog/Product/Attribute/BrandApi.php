<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\AbstractApi;
use Gubee\SDK\Model\Catalog\Product\Attribute\Brand;

class BrandApi extends AbstractApi
{
    public function create(Brand $brand): Brand
    {
        $response = $this->post('/integration/brands', $brand->jsonSerialize());
        return $this->getHydrator()->hydrate($response, new Brand());
    }

    public function loadByExternalId(string $externalId): Brand
    {
        $response = $this->get('/integration/brands/:externalId', [':externalId' => $externalId]);
        return $this->getHydrator()->hydrate($response, new Brand());
    }

    public function update(Brand $brand): Brand
    {
        $response = $this->put(
            '/integration/brands/byExternalId/:externalId',
            $brand->jsonSerialize(),
            [],
            [],
            [
                ':externalId' => $brand->getId(),
            ],
        );
        return $this->getHydrator()->hydrate($response, new Brand());
    }

    public function loadByName(string $name): Brand
    {
        $response = $this->get('/integration/brands/byName', [
            'name' => $name,
        ]);
        return $this->getHydrator()->hydrate($response, new Brand());
    }
}
