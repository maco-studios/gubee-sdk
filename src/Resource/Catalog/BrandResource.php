<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog;

use Gubee\SDK\Library\HttpClient\ResponseMediator;
use Gubee\SDK\Model\Catalog\Brand;
use Gubee\SDK\Resource\AbstractResource;

class BrandResource extends AbstractResource
{

    /**
     * POST
     * /integration/brands
     * Create brand
     */
    public function create(Brand $brand): Brand
    {
        $response = $this->post('/integration/brands', $brand->jsonSerialize());

        return Brand::fromJson($response);
    }

    /**
     * GET
     * /integration/brands/{externalId}
     * Get brand by externalId
     */
    public function getByExternalId(string $externalId): Brand
    {
        $response = $this->get(
            sprintf(
                "/integration/brands/%s",
                rawurlencode($externalId)
            )
        );

        return Brand::fromJson($response);
    }

    /**
     * PUT
     * /integration/brands/byExternalId/{externalId}
     * Update brand
     */
    public function updateByExternalId(string $externalId, Brand $brand): Brand
    {
        $response = $this->put(
            sprintf(
                "/integration/brands/byExternalId/%s",
                rawurlencode($externalId)
            ),
            $brand->jsonSerialize()
        );

        return Brand::fromJson($response);
    }

    /**
     * GET
     * /integration/brands/byId/{id}
     * Get brand by gubee id
     */
    public function getById(string $id): Brand
    {
        $response = $this->get(
            sprintf(
                "/integration/brands/byId/%s",
                rawurlencode($id)
            )
        );

        return Brand::fromJson($response);
    }

    /**
     * GET
     * /integration/brands/byName
     * Get brand by name
     */
    public function getByName(string $name): Brand
    {
        $response = $this->client->getHttpClient()->post(
            "/api/integration/brands/byName",
            [],
            $this->client->getStreamFactory()->createStream($name)
        );

        return Brand::fromJson(ResponseMediator::getContent($response));
    }

    /**
     * POST
     * /integration/brands/byName
     * Get brand by name
     */
    public function getByNameV2(string $name): Brand
    {
        $response = $this->client->getHttpClient()->post(
            self::prepareUri(
                "/integration/brands/byName"
            ),
            [],
            $this->client->getStreamFactory()->createStream($name)
        );

        return Brand::fromJson(ResponseMediator::getContent($response));
    }

    /**
     * PUT
     * /integration/brands/byName
     * Update brand by name
     */
    public function updateByName(string $name, Brand $brand): Brand
    {
        $response = $this->put(
            "/integration/brands/byName",
            $brand->jsonSerialize(),
            [],
            [],
            [
                'name' => $name
            ],
        );


        return Brand::fromJson($response);
    }

    /**
     * PUT
     * /integration/brands/v2/byName
     * Update brand by name
     */
    public function updateByNameV2(Brand $brand): Brand
    {
        $response = $this->put(
            "/integration/brands/v2/byName",
            $brand->jsonSerialize()
        );

        return $this->getById(
            $response['hubeeId']
        );
    }

}
