<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient\Plugin\Journal;

use Http\Client\Common\Plugin\Journal;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class History implements Journal
{
    protected LoggerInterface $logger;
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * Record a successful call.
     *
     * @param RequestInterface  $request  Request use to make the call
     * @param ResponseInterface $response Response returned by the call
     */
    public function addSuccess(RequestInterface $request, ResponseInterface $response): void
    {
        $this->logger->info('Request: ' . $request->getUri());
        $this->logger->info('Response: ' . $response->getStatusCode());
    }

    /**
     * Record a failed call.
     *
     * @param RequestInterface         $request   Request use to make the call
     * @param ClientExceptionInterface $exception Exception returned by the call
     */
    public function addFailure(RequestInterface $request, ClientExceptionInterface $exception): void
    {
        $this->logger->error('Request: ' . $request->getUri());
        $this->logger->error('Exception: ' . $exception->getMessage());
    }
}
