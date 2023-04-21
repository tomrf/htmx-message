<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Proxy;

use Psr\Http\Message\ResponseInterface;

/**
 * Proxy wrapping ResponseInterface.
 *
 * @internal
 */
class ResponseInterfaceProxy extends AbstractMessageInterfaceProxy implements ResponseInterface
{
    /** @var ResponseInterface */
    protected $message;

    /**
     * @internal
     */
    final public function __construct(
        ResponseInterface $message
    ) {
        // @var ResponseInterface

        $this->message = $message;
    }

    /**
     * @internal
     */
    public function getReasonPhrase()
    {
        return $this->message->getReasonPhrase();
    }

    /**
     * @internal
     */
    public function getResponse(): ResponseInterface
    {
        return $this->message;
    }

    /**
     * @internal
     */
    public function getStatusCode()
    {
        return $this->message->getStatusCode();
    }

    /**
     * @internal
     *
     * @param int    $code
     * @param string $reasonPhrase
     */
    public function withStatus($code, $reasonPhrase = '')
    {
        return new static($this->message->withStatus($code, $reasonPhrase));
    }
}
