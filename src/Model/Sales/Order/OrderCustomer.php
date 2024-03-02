<?php

namespace Gubee\SDK\Model\Sales\Order;

use Gubee\SDK\Api\Sales\Order\DocumentInterface;
use Gubee\SDK\Api\Sales\Order\OrderCustomer\PhoneInterface;
use Gubee\SDK\Api\Sales\Order\OrderCustomerInterface;
use Gubee\SDK\Model\AbstractModel;

/**
 * Model for OrderCustomerApiDTORes
 * @see
 * https://api.gubee.com.br/api/swagger-ui/#/definitions/OrderCustomerApiDTORes
 *
 * @method self setDateOfBirth(string dateOfBirth) Set the date of birth property
 * @method string getDateOfBirth() Get the date of birth property
 * @method self setDocuments(array documents) Set the documents property
 * @method array getDocuments() Get the documents property
 * @method self setEmail(string email) Set the email property
 * @method string getEmail() Get the email property
 * @method self setGender(string gender) Set the gender property
 * @method string getGender() Get the gender property
 * @method self setName(string name) Set the name property
 * @method string getName() Get the name property
 * @method self setPhones(array phones) Set the phones property
 * @method array getPhones() Get the phones property
 * @method self setReceiverName(string receiverName) Set the receiver name
 * property
 * @method string getReceiverName() Get the receiver name property
 * @method self setRecipientName(string recipientName) Set the recipient name
 * property
 * @method string getRecipientName() Get the recipient name property
 * @method bool validate() Validate the model properties
 * @method array jsonSerialize() Serialize the model to an array
 */
class OrderCustomer extends AbstractModel implements OrderCustomerInterface
{
    /**
     * @var string
     */
    protected ?string $dateOfBirth = null;

    /**
     * @var array<DocumentInterface>
     */
    protected array $documents;

    /**
     * @var string
     */
    protected ?string $email = null;

    /**
     * @var string
     */
    protected ?string $gender = null;

    /**
     * @var string
     */
    protected ?string $name = null;

    /**
     * @var array<PhoneInterface>
     */
    protected array $phones;

    /**
     * @var string
     */
    protected ?string $receiverName = null;

    /**
     * @var string
     */
    protected ?string $recipientName = null;

    /**
     * Set the date of birth property
     *
     * @param string $dateOfBirth
     * @return $this
     */
    public function setDateOfBirth(string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * Get the date of birth property
     *
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the documents property
     *
     * @param array<DocumentInterface> $documents
     * @return $this
     */
    public function setDocuments(array $documents): self
    {
        foreach ($documents as $item) {
            if (!$item instanceof DocumentInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        DocumentInterface::class
                    )
                );
            }
        }
        $this->documents = $documents;
        return $this;
    }

    /**
     * Get the documents property
     *
     * @return array<DocumentInterface>
     */
    public function getDocuments(): array
    {
        return $this->documents;
    }

    /**
     * Set the email property
     *
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the email property
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the gender property
     *
     * @param string $gender
     * @return $this
     */
    public function setGender(string $gender): self
    {
        if (!in_array($gender, self::GENDER_LIST)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The '%s' property must be one of '%s'",
                    __METHOD__,
                    implode("', '", self::GENDER_LIST)
                )
            );
        }

        $this->gender = $gender;
        return $this;
    }

    /**
     * Get the gender property
     *
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
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
     * Set the phones property
     *
     * @param array<PhoneInterface> $phones
     * @return $this
     */
    public function setPhones(array $phones): self
    {
        foreach ($phones as $item) {
            if (!$item instanceof PhoneInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        "The '%s' property must be an array of '%s'",
                        __METHOD__,
                        PhoneInterface::class
                    )
                );
            }
        }
        $this->phones = $phones;
        return $this;
    }

    /**
     * Get the phones property
     *
     * @return array<PhoneInterface>
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * Set the receiver name property
     *
     * @param string $receiverName
     * @return $this
     */
    public function setReceiverName(string $receiverName): self
    {
        $this->receiverName = $receiverName;
        return $this;
    }

    /**
     * Get the receiver name property
     *
     * @return string
     */
    public function getReceiverName(): string
    {
        return $this->receiverName;
    }

    /**
     * Set the recipient name property
     *
     * @param string $recipientName
     * @return $this
     */
    public function setRecipientName(string $recipientName): self
    {
        $this->recipientName = $recipientName;
        return $this;
    }

    /**
     * Get the recipient name property
     *
     * @return string
     */
    public function getRecipientName(): string
    {
        return $this->recipientName;
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
        if (!isset($values['documents'])) {
            $missingFields[] = 'documents';
        }

        if (!isset($values['phones'])) {
            $missingFields[] = 'phones';
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
