<?php

namespace Gubee\SDK\Model\Catalog;

use Gubee\SDK\Api\Catalog\CategoryInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for CategoryApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/CategoryApiDTORes
 *
 * @method self setActive(bool active) Set the active property
 * @method bool getActive() Get the active property
 * @method self setDescription(string description) Set the description property
 * @method string getDescription() Get the description property
 * @method self setEnabledAutoIntegration(bool enabledAutoIntegration) Set the
 * enabled auto integration property
 * @method bool getEnabledAutoIntegration() Get the enabled auto integration
 * property
 * @method self setHubeeId(string hubeeId) Set the hubee id property
 * @method string getHubeeId() Get the hubee id property
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setParent(string parent) Set the parent property
 * @method string getParent() Get the parent property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Category extends AbstractModel implements CategoryInterface
{
    /**
     * @var bool
     */
    protected bool $active;

    /**
     * @var string
     */
    protected ?string $description = null;

    /**
     * @var bool
     */
    protected bool $enabledAutoIntegration;

    /**
     * @var string
     */
    protected ?string $hubeeId = null;

    /**
     * @var string
     */
    protected ?string $id = null;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var string
     */
    protected ?string $parent = null;

    /**
     * Set the active property
     *
     * @param bool $active
     * @return $this
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Get the active property
     *
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * Set the description property
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the description property
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the enabled auto integration property
     *
     * @param bool $enabledAutoIntegration
     * @return $this
     */
    public function setEnabledAutoIntegration(bool $enabledAutoIntegration): self
    {
        $this->enabledAutoIntegration = $enabledAutoIntegration;
        return $this;
    }

    /**
     * Get the enabled auto integration property
     *
     * @return bool
     */
    public function getEnabledAutoIntegration(): bool
    {
        return $this->enabledAutoIntegration;
    }

    /**
     * Set the hubee id property
     *
     * @param string $hubeeId
     * @return $this
     */
    public function setHubeeId(string $hubeeId): self
    {
        $this->hubeeId = $hubeeId;
        return $this;
    }

    /**
     * Get the hubee id property
     *
     * @return string
     */
    public function getHubeeId(): string
    {
        return $this->hubeeId;
    }

    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the parent property
     *
     * @param string $parent
     * @return $this
     */
    public function setParent(string $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get the parent property
     *
     * @return string
     */
    public function getParent(): string
    {
        return $this->parent;
    }

    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool
    {
        $values = get_object_vars($this);
        $missingFields = [];
        if (!isset($values['active'])) {
            $missingFields[] = 'active';
        }

        if (!isset($values['enabledAutoIntegration'])) {
            $missingFields[] = 'enabledAutoIntegration';
        }

        if ($missingFields) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be set",
                    implode("', '", $missingFields)
                )
            );
        }
        return true;
    }
}
