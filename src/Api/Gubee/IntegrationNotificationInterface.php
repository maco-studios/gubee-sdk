<?php

namespace Gubee\SDK\Api\Gubee;

use Gubee\SDK\Api\ModelInterface;

interface IntegrationNotificationInterface extends ModelInterface
{
    public const ERROR = 'ERROR';

    public const INFO = 'INFO';

    public const WARNING = 'WARNING';

    public const NOTIFICATIONTYPE_LIST = [self::ERROR, self::INFO, self::WARNING];

    public const INTEGRATION = 'INTEGRATION';

    public const INTEGRATION_NOT_SUPPORTED = 'INTEGRATION_NOT_SUPPORTED';

    public const INVALID_ATTRIBUTE = 'INVALID_ATTRIBUTE';

    public const INVALID_AUTHENTICATION = 'INVALID_AUTHENTICATION';

    public const INVALID_BRAND = 'INVALID_BRAND';

    public const INVALID_CATEGORY = 'INVALID_CATEGORY';

    public const INVALID_DESCRIPTION = 'INVALID_DESCRIPTION';

    public const INVALID_DIMENSION = 'INVALID_DIMENSION';

    public const INVALID_EAN = 'INVALID_EAN';

    public const INVALID_IMAGE = 'INVALID_IMAGE';

    public const INVALID_NAME = 'INVALID_NAME';

    public const INVALID_NBM = 'INVALID_NBM';

    public const INVALID_ORDER = 'INVALID_ORDER';

    public const INVALID_ORDER_CANCELLATION = 'INVALID_ORDER_CANCELLATION';

    public const INVALID_ORDER_DELIVERY = 'INVALID_ORDER_DELIVERY';

    public const INVALID_ORDER_INVOICE = 'INVALID_ORDER_INVOICE';

    public const INVALID_ORDER_SHIPMENT_EXCEPTION = 'INVALID_ORDER_SHIPMENT_EXCEPTION';

    public const INVALID_ORDER_SHIPPING = 'INVALID_ORDER_SHIPPING';

    public const INVALID_PRICE = 'INVALID_PRICE';

    public const INVALID_STOCK = 'INVALID_STOCK';

    public const INVALID_VALUE = 'INVALID_VALUE';

    public const INVALID_WARRANTY = 'INVALID_WARRANTY';

    public const NOT_FOUND = 'NOT_FOUND';

    public const ORDER_EXCHANGE = 'ORDER_EXCHANGE';

    public const REQUIRED_FIELD = 'REQUIRED_FIELD';

    public const VALIDATION = 'VALIDATION';

    public const TYPE_LIST = [self::INTEGRATION, self::INTEGRATION_NOT_SUPPORTED, self::INVALID_ATTRIBUTE, self::INVALID_AUTHENTICATION, self::INVALID_BRAND, self::INVALID_CATEGORY, self::INVALID_DESCRIPTION, self::INVALID_DIMENSION, self::INVALID_EAN, self::INVALID_IMAGE, self::INVALID_NAME, self::INVALID_NBM, self::INVALID_ORDER, self::INVALID_ORDER_CANCELLATION, self::INVALID_ORDER_DELIVERY, self::INVALID_ORDER_INVOICE, self::INVALID_ORDER_SHIPMENT_EXCEPTION, self::INVALID_ORDER_SHIPPING, self::INVALID_PRICE, self::INVALID_STOCK, self::INVALID_VALUE, self::INVALID_WARRANTY, self::NOT_FOUND, self::ORDER_EXCHANGE, self::REQUIRED_FIELD, self::VALIDATION];

    /**
     * Set the key message property
     *
     * @param bool $keyMessage
     * @return $this
     */
    public function setKeyMessage(bool $keyMessage): self;
    /**
     * Get the key message property
     *
     * @return bool
     */
    public function getKeyMessage(): bool;
    /**
     * Set the message property
     *
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message): self;
    /**
     * Get the message property
     *
     * @return string
     */
    public function getMessage(): string;
    /**
     * Set the notification type property
     *
     * @param string $notificationType
     * @return $this
     */
    public function setNotificationType(string $notificationType): self;
    /**
     * Get the notification type property
     *
     * @return string
     */
    public function getNotificationType(): string;
    /**
     * Set the plataform property
     *
     * @param string $plataform
     * @return $this
     */
    public function setPlataform(string $plataform): self;
    /**
     * Get the plataform property
     *
     * @return string
     */
    public function getPlataform(): string;
    /**
     * Set the reason property
     *
     * @param string $reason
     * @return $this
     */
    public function setReason(string $reason): self;
    /**
     * Get the reason property
     *
     * @return string
     */
    public function getReason(): string;
    /**
     * Set the source id property
     *
     * @param string $sourceId
     * @return $this
     */
    public function setSourceId(string $sourceId): self;
    /**
     * Get the source id property
     *
     * @return string
     */
    public function getSourceId(): string;
    /**
     * Set the type property
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;
    /**
     * Get the type property
     *
     * @return string
     */
    public function getType(): string;
}
