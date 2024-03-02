<?php

namespace Gubee\SDK\Model\Catalog\Product\Attribute;

use Gubee\SDK\Api\Catalog\Product\Attribute\BrandInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for BrandApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/BrandApiDTORes
 *
 * @method self setDescription(string description) Set the description property
 * @method string getDescription() Get the description property
 * @method self setHubeeId(string hubeeId) Set the hubee id property
 * @method string getHubeeId() Get the hubee id property
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Brand extends AbstractModel implements BrandInterface
{
    /**
     * @var string
     */
    protected ?string $description = null;

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
    protected string $name;

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
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool
    {
        $values = get_object_vars($this);
        $missingFields = [];
        if (!isset($values['name'])) {
            $missingFields[] = 'name';
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
