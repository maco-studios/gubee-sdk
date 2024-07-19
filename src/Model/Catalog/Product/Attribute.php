<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Model\AbstractModel;

class Attribute extends AbstractModel
{
    /** @var string */
    protected string $attrType;
    /** @var string */
    protected string $hubeeId;
    /** @var string */
    protected string $id;
    /** @var string */
    protected string $label;
    /** @var string */
    protected string $name;
    /** @var string[] */
    protected array $options;
    /** @var bool */
    protected bool $required;
    /** @var bool */
    protected bool $variant;

    /**
     * @param string $attrType
     * @param string $hubeeId
     * @param string $id
     * @param string $label
     * @param string $name
     * @param string[] $options
     * @param bool $required
     * @param bool $variant
     */
    public function __construct(
        string $attrType,
        string $hubeeId,
        string $id,
        string $label,
        string $name,
        array $options,
        bool $required = false,
        bool $variant = false
    ) {
        $this->attrType = $attrType;
        $this->hubeeId = $hubeeId;
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->required = $required;
        $this->variant = $variant;
    }

    /**
     * @return string
     */
    public function getAttrType(): string
    {
        return $this->attrType;
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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * @return bool
     */
    public function getVariant(): bool
    {
        return $this->variant;
    }

    /**
     * @param string $attrType
     * @return self
     */
    public function setAttrType(string $attrType): self
    {
        $this->attrType = $attrType;
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
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
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
     * @param string[] $options
     * @return self
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param bool $required
     * @return self
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @param bool $variant
     * @return self
     */
    public function setVariant(bool $variant): self
    {
        $this->variant = $variant;
        return $this;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromJson(array $data): self
    {
        return new self(
            $data['attrType'],
            $data['hubeeId'],
            $data['id'],
            $data['label'],
            $data['name'],
            $data['options'],
            $data['required'],
            $data['variant']
        );
    }
}
