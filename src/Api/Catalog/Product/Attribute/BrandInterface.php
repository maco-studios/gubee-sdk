<?php

namespace Gubee\SDK\Api\Catalog\Product\Attribute;

use Gubee\SDK\Api\ModelInterface;

interface BrandInterface extends ModelInterface
{
    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self;
    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string;
    /**
     * Set the hubee id property
     *
     * @param string $hubeeId
     * @return $this
     */
    public function setHubeeId(string $hubeeId): self;
    /**
     * Get the hubee id property
     *
     * @return string
     */
    public function getHubeeId(): string;
    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;
    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
