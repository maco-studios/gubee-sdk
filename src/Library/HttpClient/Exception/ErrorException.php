<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

use const E_ERROR;

class ErrorException extends \ErrorException
{
    protected ?RequestInterface $request;
    protected ?ResponseInterface $response;

    /**
     * Constructs the Exception.
     *
     * @param null|string $message The Exception message to throw.
     * @param int|null $code The Exception code.
     * @param int|null $severity The severity level of the exception. Note :
     *                           While the severity can be any `int` value,
     *                           it is intended that the error constants be
     *                           used.
     * @param null|string $filename The filename where the exception is thrown.
     * @param int|null $line The line number where the exception is thrown.
     * @param Throwable|null $previous The previous exception used for the exception chaining.
     * @return mixed
     */
    public function __construct(
        ?RequestInterface $request = null,
        ?ResponseInterface $response = null,
        $message = "",
        $code = 0,
        $severity = E_ERROR,
        $filename = null,
        $line = null,
        $previous = null
    ) {
        if ($request !== null) {
            $this->request = $request;
        }
        if ($response !== null) {
            $this->response = $response;
        }
        parent::__construct(
            $message,
            $code,
            $severity
        );
    }

    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
