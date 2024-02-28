<?php

declare(strict_types=1);

namespace Gubee\SDK\Model\Catalog\Product\Media;

use Gubee\SDK\Api\Catalog\Product\MediaInterface;
use Gubee\SDK\Model\AbstractModel;
use InvalidArgumentException;

use function filter_var;
use function sprintf;

use const FILTER_VALIDATE_URL;

class AbstractMedia extends AbstractModel implements MediaInterface
{
    protected bool $main;
    protected string $name;
    protected string $url;
    protected int $order;
    protected string $id;

    /**
     * Set the ID of the media.
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the ID of the media.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set whether the media is the main media for the product.
     *
     * @param bool $main Whether the media is the main media.
     */
    public function setMain(bool $main): self
    {
        $this->main = $main;
        return $this;
    }

    /**
     * Get whether the media is the main media for the product.
     *
     * @return bool Whether the media is the main media.
     */
    public function getMain(): bool
    {
        return $this->main;
    }

    /**
     * Set the name of the media.
     *
     * @param string $name The name of the media.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name of the media.
     *
     * @return string The name of the media.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the URL of the media.
     *
     * @param string $url The URL of the media.
     */
    public function setUrl(string $url): self
    {
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The URL '%s' is not valid.",
                    $url
                )
            );
        }

        $this->url = $url;
        return $this;
    }

    /**
     * Get the URL of the media.
     *
     * @return string The URL of the media.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the order of the media.
     *
     * @return MediaInterface
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get the order of the media.
     */
    public function getOrder(): int
    {
        return $this->order;
    }
}
