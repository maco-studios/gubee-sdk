<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Catalog;

interface CategoryInterface
{
    /**
     * Set the category active status
     *
     * @return CategoryInterface
     */
    public function setActive(bool $active): self;

    /**
     * Get the category active status
     */
    public function getActive(): bool;

    /**
     * Set the category description
     */
    public function setDescription(string $description): string;

    /**
     * Get the category description
     */
    public function getDescription(): string;

    /**
     * Set the category auto integration to enabled
     *
     * @return CategoryInterface
     */
    public function enableAutoIntegration(): self;

    /**
     * Set the category auto integration to disabled
     *
     * @return CategoryInterface
     */
    public function disableAutoIntegration(): self;

    /**
     * Set the Hubee ID for the category.
     *
     * @param string $hubeeId The Hubee ID to set.
     */
    public function setHubeeId(string $hubeeId): self;

    /**
     * Get the Hubee ID of the category.
     *
     * @return string The Hubee ID of the category.
     */
    public function getHubeeId(): string;

    /**
     * Set the ID of the category.
     */
    public function setId(string $id): self;

    /**
     * Get the ID of the category.
     *
     * @return string The ID of the category.
     */
    public function getId(): string;

    /**
     * Set the name of the category.
     *
     * @param string $name The name of the category.
     */
    public function setName(string $name): self;

    /**
     * Get the name of the category.
     *
     * @return string The name of the category.
     */
    public function getName(): string;

    /**
     * Set the parent category of the category.
     *
     * @param CategoryInterface $parent The parent category.
     */
    public function setParent(CategoryInterface $parent): self;

    /**
     * Get the parent category of the category.
     *
     * @return CategoryInterface The parent category.
     */
    public function getParent(): CategoryInterface;
}
