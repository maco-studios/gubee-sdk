<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product;

use Gubee\SDK\Enum\Catalog\Product\Attribute\TypeEnum;
use Gubee\SDK\Model\AbstractModel;

class Attribute extends AbstractModel
{
    protected string $name;
    protected ?TypeEnum $attrType = null;
    protected ?string $hubeeId = null;
    protected ?string $id = null;
    protected ?string $label = null;
    protected ?array $options = null;
    protected ?bool $required = null;
    protected ?bool $variant = null;

	/**
	 * @param string $name
	 * @param TypeEnum|null $attrType
	 * @param string|null $hubeeId
	 * @param string|null $id
	 * @param string|null $label
	 * @param array<string>|null $options
	 * @param bool|null $required
	 * @param bool|null $variant
	 */
    public function __construct(
        string $name,
        ?TypeEnum $attrType = null,
        ?string $hubeeId = null,
        ?string $id = null,
        ?string $label = null,
        ?array $options = null,
        ?bool $required = null,
        ?bool $variant = null
    )
    {
        $this->name = $name;
        $this->attrType = TypeEnum::fromValue($attrType);
        $this->hubeeId = $hubeeId;
        $this->id = $id;
        $this->label = $label;
        $this->options = $options;
        $this->required = $required;
        $this->variant = $variant;
    }

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return TypeEnum|null
	 */
	public function getAttrType(): ?TypeEnum {
		return $this->attrType;
	}
	
	/**
	 * @param TypeEnum|null $attrType 
	 * @return self
	 */
	public function setAttrType(?TypeEnum $attrType): self {
		$this->attrType = $attrType;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getHubeeId(): ?string {
		return $this->hubeeId;
	}
	
	/**
	 * @param string|null $hubeeId 
	 * @return self
	 */
	public function setHubeeId(?string $hubeeId): self {
		$this->hubeeId = $hubeeId;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getId(): ?string {
		return $this->id;
	}
	
	/**
	 * @param string|null $id 
	 * @return self
	 */
	public function setId(?string $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLabel(): ?string {
		return $this->label;
	}
	
	/**
	 * @param string|null $label 
	 * @return self
	 */
	public function setLabel(?string $label): self {
		$this->label = $label;
		return $this;
	}

	/**
	 * @return array|null
	 */
	public function getOptions(): ?array {
		return $this->options;
	}
	
	/**
	 * @param array|null $options 
	 * @return self
	 */
	public function setOptions(?array $options): self {
		$this->options = $options;
		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getRequired(): ?bool {
		return $this->required;
	}
	
	/**
	 * @param bool|null $required 
	 * @return self
	 */
	public function setRequired(?bool $required): self {
		$this->required = $required;
		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getVariant(): ?bool {
		return $this->variant;
	}
	
	/**
	 * @param bool|null $variant 
	 * @return self
	 */
	public function setVariant(?bool $variant): self {
		$this->variant = $variant;
		return $this;
	}
}
