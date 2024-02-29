<?php

declare(strict_types=1);

namespace Gubee\SDK\Resource\Catalog\Product;

use Gubee\SDK\Api\Catalog\ProductInterface;
use Gubee\SDK\Library\HttpClient\Exception\ErrorException;
use Gubee\SDK\Library\HttpClient\ResponseHandler;
use Gubee\SDK\Resource\AbstractResource;
use Throwable;

class ValidateResource extends AbstractResource
{
    /**
     * Validate Product payload for creation
     *
     * @return array|bool
     */
    public function create(ProductInterface $product)
    {
        try {
            $this->post('/integration/validations/product/create', $product->jsonSerialize());
            return true;
        } catch (ErrorException $e) {
            $body = ResponseHandler::getContent($e->getResponse());
            if (isset($body['fieldErrors'])) {
                return $body['fieldErrors'];
            }
        } catch (Throwable $e) {
            throw $e;
        }
    }

    /**
     * Validate Product payload for update
     *
     * @return array
     */
    public function update(ProductInterface $product): array
    {
        return $this->post('/integration/validations/product/update', $product->jsonSerialize());
    }
}
