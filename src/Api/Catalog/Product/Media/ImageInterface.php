<?php

namespace Gubee\SDK\Api\Catalog\Product\Media;

use Gubee\SDK\Api\ModelInterface;

interface ImageInterface extends ModelInterface
{
    /**
     * Set the id property
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;
    /**
     * Get the id property
     *
     * @return string
     */
    public function getId(): string;
    /**
     * Set the main property
     *
     * @param bool $main
     * @return $this
     */
    public function setMain(bool $main): self;
    /**
     * Get the main property
     *
     * @return bool
     */
    public function getMain(): bool;
    /**
     * Set the name property
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;
    /**
     * Get the name property
     *
     * @return string
     */
    public function getName(): string;
    /**
     * Set the order property
     *
     * @param int $order
     * @return $this
     */
    public function setOrder(int $order): self;
    /**
     * Get the order property
     *
     * @return int
     */
    public function getOrder(): int;
    /**
     * Set the url property
     *
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self;
    /**
     * Get the url property
     *
     * @return string
     */
    public function getUrl(): string;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
