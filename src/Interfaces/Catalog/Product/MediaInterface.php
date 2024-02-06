<?php

declare(strict_types=1);

namespace Gubee\SDK\Interfaces\Catalog\Product;

interface MediaInterface
{
    /**
     * Set whether the media is the main media for the product.
     *
     * @param bool $main Whether the media is the main media.
     */
    public function setMain(bool $main): self;

    /**
     * Get whether the media is the main media for the product.
     *
     * @return bool Whether the media is the main media.
     */
    public function getMain(): bool;

    /**
     * Set the name of the media.
     *
     * @param string $name The name of the media.
     */
    public function setName(string $name): self;

    /**
     * Get the name of the media.
     *
     * @return string The name of the media.
     */
    public function getName(): string;

    /**
     * Set the URL of the media.
     *
     * @param string $url The URL of the media.
     */
    public function setUrl(string $url): self;

    /**
     * Get the URL of the media.
     *
     * @return string The URL of the media.
     */
    public function getUrl(): string;
}
