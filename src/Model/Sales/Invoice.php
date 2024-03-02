<?php

namespace Gubee\SDK\Model\Sales;

use DateTimeInterface;
use Gubee\SDK\Api\Sales\InvoiceInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for InvoiceApiDTORes
 * @see https://api.gubee.com.br/api/swagger-ui/#/definitions/InvoiceApiDTORes
 *
 * @method self setDanfeLink(string danfeLink) Set the danfe link property
 * @method string getDanfeLink() Get the danfe link property
 * @method self setDanfeXml(string danfeXml) Set the danfe xml property
 * @method string getDanfeXml() Get the danfe xml property
 * @method self setIssueDate(DateTimeInterface issueDate) Set the issue date
 * property
 * @method DateTimeInterface getIssueDate() Get the issue date property
 * @method self setKey(string key) Set the key property
 * @method string getKey() Get the key property
 * @method self setLine(string line) Set the line property
 * @method string getLine() Get the line property
 * @method self setNumber(string number) Set the number property
 * @method string getNumber() Get the number property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class Invoice extends AbstractModel implements InvoiceInterface
{
    /**
     * @var string
     */
    protected ?string $danfeLink = null;

    /**
     * @var string
     */
    protected ?string $danfeXml = null;

    /**
     * @var DateTimeInterface
     */
    protected DateTimeInterface $issueDate;

    /**
     * @var string
     */
    protected string $key;

    /**
     * @var string
     */
    protected string $line;

    /**
     * @var string
     */
    protected string $number;

    /**
     * Set the danfe link property
     *
     * @param string $danfeLink
     * @return $this
     */
    public function setDanfeLink(string $danfeLink): self
    {
        $this->danfeLink = $danfeLink;
        return $this;
    }

    /**
     * Get the danfe link property
     *
     * @return string
     */
    public function getDanfeLink(): string
    {
        return $this->danfeLink;
    }

    /**
     * Set the danfe xml property
     *
     * @param string $danfeXml
     * @return $this
     */
    public function setDanfeXml(string $danfeXml): self
    {
        $this->danfeXml = $danfeXml;
        return $this;
    }

    /**
     * Get the danfe xml property
     *
     * @return string
     */
    public function getDanfeXml(): string
    {
        return $this->danfeXml;
    }

    /**
     * Set the issue date property
     *
     * @param DateTimeInterface $issueDate
     * @return $this
     */
    public function setIssueDate(DateTimeInterface $issueDate): self
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * Get the issue date property
     *
     * @return DateTimeInterface
     */
    public function getIssueDate(): DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * Set the key property
     *
     * @param string $key
     * @return $this
     */
    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Get the key property
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Set the line property
     *
     * @param string $line
     * @return $this
     */
    public function setLine(string $line): self
    {
        $this->line = $line;
        return $this;
    }

    /**
     * Get the line property
     *
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * Set the number property
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get the number property
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
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
        if (!isset($values['issueDate'])) {
            $missingFields[] = 'issueDate';
        }

        if (!isset($values['key'])) {
            $missingFields[] = 'key';
        }

        if (!isset($values['line'])) {
            $missingFields[] = 'line';
        }

        if (!isset($values['number'])) {
            $missingFields[] = 'number';
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
