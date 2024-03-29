<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Proxy;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Abstract proxy class wrapping MessageInterface.
 *
 * @phpstan-consistent-constructor
 */
abstract class AbstractMessageInterfaceProxy implements MessageInterface
{
    /** @var MessageInterface */
    protected $message;

    public function __construct(
        MessageInterface $message
    ) {
        $this->message = $message;
    }

    public function getBody()
    {
        return $this->message->getBody();
    }

    /**
     * @param string $name
     */
    public function getHeader($name)
    {
        return $this->message->getHeader($name);
    }

    /**
     * @param string $name
     */
    public function getHeaderLine($name)
    {
        return $this->message->getHeaderLine($name);
    }

    public function getHeaders()
    {
        return $this->message->getHeaders();
    }

    public function getProtocolVersion()
    {
        return $this->message->getProtocolVersion();
    }

    /**
     * @param string $name
     */
    public function hasHeader($name)
    {
        return $this->message->hasHeader($name);
    }

    /**
     * @param string               $name
     * @param array<string>|string $value
     */
    public function withAddedHeader($name, $value)
    {
        return new static($this->message->withAddedHeader($name, $value));
    }

    public function withBody(StreamInterface $body)
    {
        return new static($this->message->withBody($body));
    }

    /**
     * @param string               $name
     * @param array<string>|string $value
     */
    public function withHeader($name, $value)
    {
        return new static($this->message->withHeader($name, $value));
    }

    /**
     * @param string $name
     */
    public function withoutHeader($name)
    {
        return new static($this->message->withoutHeader($name));
    }

    /**
     * @param string $version
     */
    public function withProtocolVersion($version)
    {
        return new static($this->message->withProtocolVersion($version));
    }
}
