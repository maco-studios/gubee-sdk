<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Variation\Media;

use Gubee\SDK\Model\AbstractModel;

abstract class AbstractMedia extends AbstractModel
{
    protected bool $main = false;
    protected int $order;
    protected ?string $id = null;
    protected ?string $name = null;
    protected ?string $url = null;

    public function __construct(
        bool $main,
        int $order,
        ?string $id = null,
        ?string $name = null,
        ?string $url = null
    )
    {
        $this->main = $main;
        $this->order = $order;
        if ($id !== null) {
            $this->setId($id);
        }
        if ($name !== null) {
            $this->setName($name);
        }
        if ($url !== null) {
            $this->setUrl($url);
        }
    }


    /**
     * @return bool
     */
    public function getMain(): bool
    {
        return $this->main;
    }

    /**
     * @param bool $main 
     * @return self
     */
    public function setMain(bool $main): self
    {
        $this->main = $main;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order 
     * @return self
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id 
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url 
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
}