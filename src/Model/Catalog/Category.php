<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Model\AbstractModel;

class Category extends AbstractModel
{
    /** @var bool */
    protected bool $active;
    /** @var string */
    protected string $description;
    /** @var bool */
    protected bool $enabledAutoIntegration;
    /** @var string */
    protected string $hubeeId;
    /** @var string */
    protected string $id;
    /** @var string */
    protected string $name;
    /** @var string */
    protected string $parent;

    /**
     * @param bool $active
     * @param string $description
     * @param bool $enabledAutoIntegration
     * @param string $hubeeId
     * @param string $id
     * @param string $name
     * @param string $parent
     */
    public function __construct(
        bool $active,
        string $description,
        string $name,
        string $id = null,
        bool $enabledAutoIntegration = false,
        string $parent = null,
        string $hubeeId = null
    ) {
        $this->active = $active;
        $this->description = $description;
        $this->name = $name;
        $this->enabledAutoIntegration = $enabledAutoIntegration;

        if ($id !== null) {
            $this->id = $id;
        }
        if ($hubeeId !== null) {
            $this->hubeeId = $hubeeId;
        }
        if ($parent !== null) {
            $this->parent = $parent;
        }
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function getEnabledAutoIntegration(): bool
    {
        return $this->enabledAutoIntegration;
    }

    /**
     * @return string
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getParent(): string
    {
        return $this->parent;
    }

    /**
     * @param bool $active
     * @return self
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param bool $enabledAutoIntegration
     * @return self
     */
    public function setEnabledAutoIntegration(bool $enabledAutoIntegration): self
    {
        $this->enabledAutoIntegration = $enabledAutoIntegration;
        return $this;
    }

    /**
     * @param string $hubeeId
     * @return self
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $parent
     * @return self
     */
    public function setParent(string $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromJson(array $data): self
    {
        return new self(
            (bool) $data['active'],
            $data['description'],
            $data['name'],
            isset($data['id']) ? $data['id'] : null,
            isset($data['enabledAutoIntegration']) ? (bool) $data['enabledAutoIntegration'] : false,
            isset($data['parent']) ? $data['parent'] : null,
            isset($data['hubeeId']) ? $data['hubeeId'] : null
        );
    }
}
