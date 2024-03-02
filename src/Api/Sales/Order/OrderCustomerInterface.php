<?php

namespace Gubee\SDK\Api\Sales\Order;

use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Sales\Order\OrderCustomer\PhoneInterface;

interface OrderCustomerInterface extends ModelInterface
{
    public const FEMALE = 'FEMALE';

    public const MALE = 'MALE';

    public const UNISEX = 'UNISEX';

    public const GENDER_LIST = [self::FEMALE, self::MALE, self::UNISEX];

    /**
     * Set the date of birth property
     *
     * @param string $dateOfBirth
     * @return $this
     */
    public function setDateOfBirth(string $dateOfBirth): self;
    /**
     * Get the date of birth property
     *
     * @return string
     */
    public function getDateOfBirth(): string;
    /**
     * Set the documents property
     *
     * @param array<DocumentInterface> $documents
     * @return $this
     */
    public function setDocuments(array $documents): self;
    /**
     * Get the documents property
     *
     * @return array<DocumentInterface>
     */
    public function getDocuments(): array;
    /**
     * Set the email property
     *
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self;
    /**
     * Get the email property
     *
     * @return string
     */
    public function getEmail(): string;
    /**
     * Set the gender property
     *
     * @param string $gender
     * @return $this
     */
    public function setGender(string $gender): self;
    /**
     * Get the gender property
     *
     * @return string
     */
    public function getGender(): string;
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
     * Set the phones property
     *
     * @param array<PhoneInterface> $phones
     * @return $this
     */
    public function setPhones(array $phones): self;
    /**
     * Get the phones property
     *
     * @return array<PhoneInterface>
     */
    public function getPhones(): array;
    /**
     * Set the receiver name property
     *
     * @param string $receiverName
     * @return $this
     */
    public function setReceiverName(string $receiverName): self;
    /**
     * Get the receiver name property
     *
     * @return string
     */
    public function getReceiverName(): string;
    /**
     * Set the recipient name property
     *
     * @param string $recipientName
     * @return $this
     */
    public function setRecipientName(string $recipientName): self;
    /**
     * Get the recipient name property
     *
     * @return string
     */
    public function getRecipientName(): string;
    /**
     * Validate the model properties
     *
     * @return bool
     * @throws \InvalidArgumentException if a required field is missing
     */
    public function validate(): bool;
}
