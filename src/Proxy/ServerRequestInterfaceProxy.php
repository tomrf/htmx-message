<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Proxy;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Proxy wrapping ServerRequestInterface.
 */
class ServerRequestInterfaceProxy extends AbstractMessageInterfaceProxy implements ServerRequestInterface
{
    /** @var ServerRequestInterface */
    protected $message;

    final public function __construct(
        ServerRequestInterface $message
    ) {
        /** @var ServerRequestInterface */
        $message = $message;

        $this->message = $message;
    }

    /**
     * @param string     $name
     * @param null|mixed $default
     */
    public function getAttribute($name, $default = null)
    {
        return $this->message->getAttribute($name, $default);
    }

    /**
     * @return array<mixed>
     */
    public function getAttributes()
    {
        return $this->message->getAttributes();
    }

    /**
     * @return array<mixed>
     */
    public function getCookieParams()
    {
        return $this->message->getCookieParams();
    }

    public function getMethod()
    {
        return $this->message->getMethod();
    }

    /**
     * @return null|array<mixed>|object
     */
    public function getParsedBody()
    {
        return $this->message->getParsedBody();
    }

    /**
     * @return array<mixed>
     */
    public function getQueryParams()
    {
        return $this->message->getQueryParams();
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->message;
    }

    public function getRequestTarget()
    {
        return $this->message->getRequestTarget();
    }

    /**
     * @return array<mixed>
     */
    public function getServerParams()
    {
        return $this->message->getServerParams();
    }

    /**
     * @return array<mixed>
     */
    public function getUploadedFiles()
    {
        return $this->message->getUploadedFiles();
    }

    public function getUri()
    {
        return $this->message->getUri();
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function withAttribute($name, $value)
    {
        return new static($this->message->withAttribute($name, $value));
    }

    /**
     * @param array<mixed> $cookies
     */
    public function withCookieParams(array $cookies)
    {
        return new static($this->message->withCookieParams($cookies));
    }

    /**
     * @param string $method
     */
    public function withMethod($method)
    {
        return new static($this->message->withMethod($method));
    }

    /**
     * @param string $name
     */
    public function withoutAttribute($name)
    {
        return new static($this->message->withoutAttribute($name));
    }

    /**
     * @param null|array<mixed>|object $data
     */
    public function withParsedBody($data)
    {
        return new static($this->message->withParsedBody($data));
    }

    /**
     * @param string $version
     */
    public function withProtocolVersion($version)
    {
        return new static($this->message->withProtocolVersion($version));
    }

    /**
     * @param array<mixed> $query
     */
    public function withQueryParams(array $query)
    {
        return new static($this->message->withQueryParams($query));
    }

    /**
     * @param string $requestTarget
     */
    public function withRequestTarget($requestTarget)
    {
        return new static($this->message->withRequestTarget($requestTarget));
    }

    /**
     * @param array<mixed> $uploadedFiles
     */
    public function withUploadedFiles(array $uploadedFiles)
    {
        return new static($this->message->withUploadedFiles($uploadedFiles));
    }

    /**
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @param bool $preserveHost
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        return new static($this->message->withUri($uri, $preserveHost));
    }
}
