<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Interfaces\Catalog\Product\Attribute\BrandInterface;
use Gubee\SDK\Model\AbstractModel;

class Brand extends AbstractModel implements BrandInterface
{
    protected ?string $description = "";
    protected string $hubeeId;
    protected string $id;
    protected string $name;

    /**
     * Get the description of the brand.
     *
     * @return string The description of the brand.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the description of the brand.
     *
     * @param string $description The description of the brand.
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the Hubee ID of the brand.
     *
     * @return string The Hubee ID of the brand.
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * Set the Hubee ID of the brand.
     *
     * @param string $hubeeId The Hubee ID of the brand.
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * Set the ID of the brand.
     *
     * @param string $id The ID of the brand.
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the ID of the brand.
     *
     * @return string The ID of the brand.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the name of the brand.
     *
     * @return string The name of the brand.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name of the brand.
     *
     * @param string $name The name of the brand.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
