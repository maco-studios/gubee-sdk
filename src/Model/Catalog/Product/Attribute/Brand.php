<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Model\AbstractModel;

class Brand extends AbstractModel
{
    protected string $name;
    protected ?string $description = null;
    protected ?string $hubeeId     = null;
    protected ?string $id          = null;

    public function __construct(
        string $name,
        ?string $description = null,
        ?string $hubeeId = null,
        ?string $id = null
    ) {
        $this->setName($name);
        if ($description) {
            $this->setDescription($description);
        }
        if ($hubeeId) {
            $this->setHubeeId($hubeeId);
        }
        if ($id) {
            $this->setId($id);
        }
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getHubeeId(): ?string
    {
        return $this->hubeeId;
    }

    public function setHubeeId(?string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }
}
