<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Model\AbstractModel;

class Brand extends AbstractModel
{
    /** @var string */
    protected string $description;
    /** @var string */
    protected string $hubeeId;
    /** @var string */
    protected string $id;
    /** @var string */
    protected string $name;

    /**
     * @param string $description
     * @param string $hubeeId
     * @param string $id
     * @param string $name
     */
    public function __construct(
        string $id,
        string $name,
        string $description,
        string $hubeeId = null
    ) {
        $this->description = $description;
        $this->id = $id;
        $this->name = $name;
        if ($hubeeId !== null) {
            $this->hubeeId = $hubeeId;
        }
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
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
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
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
     * @param array $data
     * @return self
     */
    public static function fromJson(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['hubeeId'],
        );
    }
}
