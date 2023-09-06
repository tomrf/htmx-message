<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Proxy;

use Psr\Http\Message\ResponseInterface;

/**
 * Proxy wrapping ResponseInterface.
 */
class ResponseInterfaceProxy extends AbstractMessageInterfaceProxy implements ResponseInterface
{
    /** @var ResponseInterface */
    protected $message;

    final public function __construct(
        ResponseInterface $message
    ) {
        // @var ResponseInterface

        $this->message = $message;
    }

    public function getReasonPhrase()
    {
        return $this->message->getReasonPhrase();
    }

    public function getResponse(): ResponseInterface
    {
        return $this->message;
    }

    public function getStatusCode()
    {
        return $this->message->getStatusCode();
    }

    /**
     * @param int    $code
     * @param string $reasonPhrase
     */
    public function withStatus($code, $reasonPhrase = '')
    {
        return new static($this->message->withStatus($code, $reasonPhrase));
    }
}
