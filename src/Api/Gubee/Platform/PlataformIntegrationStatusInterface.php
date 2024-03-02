<?php

namespace Gubee\SDK\Api\Gubee\Platform;

use DateTimeInterface;
use Gubee\SDK\Api\ModelInterface;
use Gubee\SDK\Api\Gubee\IntegrationNotificationInterface;

interface PlataformIntegrationStatusInterface extends ModelInterface
{
    public const ERROR = 'ERROR';

    public const INTEGRATED = 'INTEGRATED';

    public const IN_VALIDATION = 'IN_VALIDATION';

    public const PENDING = 'PENDING';

    public const READY = 'READY';

    public const RUNNING = 'RUNNING';

    public const STATUS_LIST = [self::ERROR, self::INTEGRATED, self::IN_VALIDATION, self::PENDING, self::READY, self::RUNNING];

    /**
     * Set the errors property
     *
     * @param array<IntegrationNotificationInterface> $errors
     * @return $this
     */
    public function setErrors(array $errors): self;
    /**
     * Get the errors property
     *
     * @return array<IntegrationNotificationInterface>
     */
    public function getErrors(): array;
    /**
     * Set the event id property
     *
     * @param string $eventId
     * @return $this
     */
    public function setEventId(string $eventId): self;
    /**
     * Get the event id property
     *
     * @return string
     */
    public function getEventId(): string;
    /**
     * Set the last modified dt property
     *
     * @param DateTimeInterface $lastModifiedDt
     * @return $this
     */
    public function setLastModifiedDt(DateTimeInterface $lastModifiedDt): self;
    /**
     * Get the last modified dt property
     *
     * @return DateTimeInterface
     */
    public function getLastModifiedDt(): DateTimeInterface;
    /**
     * Set the notifications property
     *
     * @param array<IntegrationNotificationInterface> $notifications
     * @return $this
     */
    public function setNotifications(array $notifications): self;
    /**
     * Get the notifications property
     *
     * @return array<IntegrationNotificationInterface>
     */
    public function getNotifications(): array;
    /**
     * Set the partner status property
     *
     * @param string $partnerStatus
     * @return $this
     */
    public function setPartnerStatus(string $partnerStatus): self;
    /**
     * Get the partner status property
     *
     * @return string
     */
    public function getPartnerStatus(): string;
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
     * Set the platform property
     *
     * @param string $platform
     * @return $this
     */
    public function setPlatform(string $platform): self;
    /**
     * Get the platform property
     *
     * @return string
     */
    public function getPlatform(): string;
    /**
     * Set the status property
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self;
    /**
     * Get the status property
     *
     * @return string
     */
    public function getStatus(): string;
}
