<?php

namespace Gubee\SDK\Model\Catalog\Product\Media;

use Gubee\SDK\Api\Catalog\Product\Media\VideoInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for VideoDTO
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/VideoDTO
 *
 * @method self setId(string id) Set the id property
 * @method string getId() Get the id property
 * @method self setMain(bool main) Set the main property
 * @method bool getMain() Get the main property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setOrder(int order) Set the order property
 * @method int getOrder() Get the order property
 * @method self setUrl(string url) Set the url property
 * @method string getUrl() Get the url property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Video extends AbstractModel implements VideoInterface
{
    /**
     * @var string
     */
    protected ?string $id = null;

    /**
     * @var bool
     */
    protected bool $main;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var int
     */
    protected int $order;

    /**
     * @var string
     */
    protected ?string $url = null;

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
     * Set the main property
     *
     * @param bool $main
     * @return $this
     */
    public function setMain(bool $main): self
    {
        $this->main = $main;
        return $this;
    }

    /**
     * Get the main property
     *
     * @return bool
     */
    public function getMain(): bool
    {
        return $this->main;
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
     * Set the order property
     *
     * @param int $order
     * @return $this
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get the order property
     *
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * Set the url property
     *
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get the url property
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
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
        if (!isset($values['main'])) {
            $missingFields[] = 'main';
        }

        if (!isset($values['order'])) {
            $missingFields[] = 'order';
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
