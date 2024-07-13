<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Model\AbstractModel;

class Category extends AbstractModel
{
    protected bool $active;
    protected string $description;
    protected bool $enabledAutoIntegration;
    protected string $hubeeId;
    protected string $id;
    protected string $name;
    protected string $parent;

    public function __construct(
        string $id,
        string $name,
        string $description,
        bool $active = true,
        bool $enabledAutoIntegration = false,
        ?string $parent = null,
        ?string $hubeeId = null
    ) {
        $this->active                 = $active;
        $this->description            = $description;
        $this->name                   = $name;
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

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEnabledAutoIntegration(): bool
    {
        return $this->enabledAutoIntegration;
    }

    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParent(): string
    {
        return $this->parent;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setEnabledAutoIntegration(bool $enabledAutoIntegration): self
    {
        $this->enabledAutoIntegration = $enabledAutoIntegration;
        return $this;
    }

    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setParent(string $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @param array $data
     */
    public static function fromJson(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            (bool) $data['active'],
            isset($data['enabledAutoIntegration']) ? (bool) $data['enabledAutoIntegration'] : false,
            $data['parent'] ?? null,
            $data['hubeeId'] ?? null
        );
    }
}
