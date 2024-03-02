<?php

namespace Gubee\SDK\Api\Sales;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;

interface InvoiceInterface extends ModelInterface
{
    /**
     * Set the danfe link property
     *
     * @param string $danfeLink
     * @return $this
     */
    public function setDanfeLink(string $danfeLink): self;
    /**
     * Get the danfe link property
     *
     * @return string
     */
    public function getDanfeLink(): string;
    /**
     * Set the danfe xml property
     *
     * @param string $danfeXml
     * @return $this
     */
    public function setDanfeXml(string $danfeXml): self;
    /**
     * Get the danfe xml property
     *
     * @return string
     */
    public function getDanfeXml(): string;
    /**
     * Set the issue date property
     *
     * @param DateTimeInterface $issueDate
     * @return $this
     */
    public function setIssueDate(DateTimeInterface $issueDate): self;
    /**
     * Get the issue date property
     *
     * @return DateTimeInterface
     */
    public function getIssueDate(): DateTimeInterface;
    /**
     * Set the key property
     *
     * @param string $key
     * @return $this
     */
    public function setKey(string $key): self;
    /**
     * Get the key property
     *
     * @return string
     */
    public function getKey(): string;
    /**
     * Set the line property
     *
     * @param string $line
     * @return $this
     */
    public function setLine(string $line): self;
    /**
     * Get the line property
     *
     * @return string
     */
    public function getLine(): string;
    /**
     * Set the number property
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self;
    /**
     * Get the number property
     *
     * @return string
     */
    public function getNumber(): string;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
