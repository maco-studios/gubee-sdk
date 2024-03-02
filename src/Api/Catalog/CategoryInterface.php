<?php

namespace Gubee\SDK\Api\Catalog;

use Gubee\SDK\Api\ModelInterface;

interface CategoryInterface extends ModelInterface
{
    /**
     * Set the active property
     *
     * @param bool $active
     * @return $this
     */
    public function setActive(bool $active): self;
    /**
     * Get the active property
     *
     * @return bool
     */
    public function getActive(): bool;
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
     * Set the enabled auto integration property
     *
     * @param bool $enabledAutoIntegration
     * @return $this
     */
    public function setEnabledAutoIntegration(bool $enabledAutoIntegration): self;
    /**
     * Get the enabled auto integration property
     *
     * @return bool
     */
    public function getEnabledAutoIntegration(): bool;
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
     * Set the parent property
     *
     * @param string $parent
     * @return $this
     */
    public function setParent(string $parent): self;
    /**
     * Get the parent property
     *
     * @return string
     */
    public function getParent(): string;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
