<?php

declare(strict_types=1);

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;

/**
 * Interface for the Brand attribute of a product.
 */
interface BrandInterface extends ModelInterface
{
    /**
     * Get the description of the brand.
     *
     * @return string The description of the brand.
     */
    public function getDescription(): string;

    /**
     * Set the description of the brand.
     *
     * @param string $description The description of the brand.
     */
    public function setDescription(string $description): self;

    /**
     * Get the Hubee ID of the brand.
     *
     * @return string The Hubee ID of the brand.
     */
    public function getHubeeId(): string;

    /**
     * Set the Hubee ID of the brand.
     *
     * @param string $hubeeId The Hubee ID of the brand.
     */
    public function setHubeeId(string $hubeeId): self;

    /**
     * Set the ID of the brand.
     *
     * @param string $id The ID of the brand.
     */
    public function setId(string $id): self;

    /**
     * Get the ID of the brand.
     *
     * @return string The ID of the brand.
     */
    public function getId(): string;

    /**
     * Get the name of the brand.
     *
     * @return string The name of the brand.
     */
    public function getName(): string;

    /**
     * Set the name of the brand.
     *
     * @param string $name The name of the brand.
     */
    public function setName(string $name): self;
}
