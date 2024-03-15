<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Model\AbstractModel;

class Category extends AbstractModel
{
    protected string $id;
    protected string $name;
    protected ?bool $active                 = null;
    protected ?string $description          = null;
    protected ?bool $enabledAutoIntegration = null;
    protected ?string $hubeeId              = null;
    protected ?Category $parent             = null;

    public function __construct(
        string $id,
        string $name,
        ?bool $active = null,
        ?string $description = null,
        ?bool $enabledAutoIntegration = null,
        ?string $hubeeId = null,
        ?Category $parent = null
    ) {
        $this->setId($id);
        $this->setName($name);
        if ($active !== null) {
            $this->setActive($active);
        }
        if ($description !== null) {
            $this->setDescription($description);
        }
        if ($enabledAutoIntegration !== null) {
            $this->setEnabledAutoIntegration($enabledAutoIntegration);
        }
        if ($hubeeId !== null) {
            $this->setHubeeId($hubeeId);
        }
        if ($parent !== null) {
            $this->setParent($parent);
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getEnabledAutoIntegration(): bool
    {
        return $this->enabledAutoIntegration;
    }

    public function setEnabledAutoIntegration(bool $enabledAutoIntegration): self
    {
        $this->enabledAutoIntegration = $enabledAutoIntegration;
        return $this;
    }

    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    public function getParent(): Category
    {
        return $this->parent;
    }

    public function setParent(Category $parent): self
    {
        $this->parent = $parent;
        return $this;
    }
}
