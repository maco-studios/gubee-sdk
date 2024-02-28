<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Api\Catalog\CategoryInterface;
use Gubee\SDK\Model\AbstractModel;
use ReflectionClass;

use function array_filter;
use function array_map;
use function in_array;

use const ARRAY_FILTER_USE_KEY;

class Category extends AbstractModel implements CategoryInterface
{
    protected bool $active;
    protected string $description;
    protected bool $enabledAutoIntegration;
    protected string $hubeeId;
    protected string $id;
    protected string $name;
    protected CategoryInterface $parent;

    /**
     * Set the category active status
     *
     * @return CategoryInterface
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Get the category active status
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * Set the category description
     */
    public function setDescription(string $description): string
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the category description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the category auto integration to enabled
     *
     * @return CategoryInterface
     */
    public function enableAutoIntegration(): self
    {
        $this->enabledAutoIntegration = true;
        return $this;
    }

    /**
     * Set the category auto integration to disabled
     *
     * @return CategoryInterface
     */
    public function disableAutoIntegration(): self
    {
        $this->enabledAutoIntegration = false;
        return $this;
    }

    /**
     * Set the Hubee ID for the category.
     *
     * @param string $hubeeId The Hubee ID to set.
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * Get the Hubee ID of the category.
     *
     * @return string The Hubee ID of the category.
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * Set the ID of the category.
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the ID of the category.
     *
     * @return string The ID of the category.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the name of the category.
     *
     * @param string $name The name of the category.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name of the category.
     *
     * @return string The name of the category.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the parent category of the category.
     *
     * @param CategoryInterface $parent The parent category.
     */
    public function setParent(CategoryInterface $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get the parent category of the category.
     *
     * @return CategoryInterface The parent category.
     */
    public function getParent(): CategoryInterface
    {
        return $this->parent;
    }

    /**
     * Serialize the object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $values     = parent::jsonSerialize();
        $properties = (new ReflectionClass(self::class))->getProperties();
        /**
         * Filter array based on the class properties
         */
        $values = array_filter($values, function ($key) use ($properties) {
            return in_array($key, array_map(function ($property) {
                return $property->getName();
            }, $properties));
        }, ARRAY_FILTER_USE_KEY);

        if (isset($values['parent'])) {
            $values['parent'] = $values['parent']->getId();
        }
        return $values;
    }
}
