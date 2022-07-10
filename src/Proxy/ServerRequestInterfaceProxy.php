<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Proxy;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Proxy wrapping ServerRequestInterface.
 *
 * @internal
 */
class ServerRequestInterfaceProxy extends AbstractMessageInterfaceProxy implements ServerRequestInterface
{
    /** @var ServerRequestInterface */
    protected $message;

    /**
     * @internal
     */
    final public function __construct(
        ServerRequestInterface $message
    ) {
        /** @var ServerRequestInterface */
        $message = $message;

        $this->message = $message;
    }

    /**
     * @internal
     *
     * @param string     $name
     * @param null|mixed $default
     */
    public function getAttribute($name, $default = null)
    {
        return $this->message->getAttribute($name, $default);
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getAttributes()
    {
        return $this->message->getAttributes();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getCookieParams()
    {
        return $this->message->getCookieParams();
    }

    /**
     * @internal
     */
    public function getMethod()
    {
        return $this->message->getMethod();
    }

    /**
     * @internal
     *
     * @return null|array<mixed>|object
     */
    public function getParsedBody()
    {
        return $this->message->getParsedBody();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getQueryParams()
    {
        return $this->message->getQueryParams();
    }

    /**
     * @internal
     */
    public function getRequest(): ServerRequestInterface
    {
        return $this->message;
    }

    /**
     * @internal
     */
    public function getRequestTarget()
    {
        return $this->message->getRequestTarget();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getServerParams()
    {
        return $this->message->getServerParams();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getUploadedFiles()
    {
        return $this->message->getUploadedFiles();
    }

    /**
     * @internal
     */
    public function getUri()
    {
        return $this->message->getUri();
    }

    /**
     * @internal
     *
     * @param string $name
     * @param mixed  $value
     */
    public function withAttribute($name, $value)
    {
        return new static($this->message->withAttribute($name, $value));
    }

    /**
     * @internal
     *
     * @param array<mixed> $cookies
     */
    public function withCookieParams(array $cookies)
    {
        return new static($this->message->withCookieParams($cookies));
    }

    /**
     * @internal
     *
     * @param string $method
     */
    public function withMethod($method)
    {
        return new static($this->message->withMethod($method));
    }

    /**
     * @internal
     *
     * @param string $name
     */
    public function withoutAttribute($name)
    {
        return new static($this->message->withoutAttribute($name));
    }

    /**
     * @internal
     *
     * @param null|array<mixed>|object $data
     */
    public function withParsedBody($data)
    {
        return new static($this->message->withParsedBody($data));
    }

    /**
     * @internal
     *
     * @param string $version
     */
    public function withProtocolVersion($version)
    {
        return new static($this->message->withProtocolVersion($version));
    }

    /**
     * @internal
     *
     * @param array<mixed> $query
     */
    public function withQueryParams(array $query)
    {
        return new static($this->message->withQueryParams($query));
    }

    /**
     * @internal
     *
     * @param mixed $requestTarget
     */
    public function withRequestTarget($requestTarget)
    {
        return new static($this->message->withRequestTarget($requestTarget));
    }

    /**
     * @internal
     *
     * @param array<mixed> $uploadedFiles
     */
    public function withUploadedFiles(array $uploadedFiles)
    {
        return new static($this->message->withUploadedFiles($uploadedFiles));
    }

    /**
     * @internal
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @param bool $preserveHost
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        return new static($this->message->withUri($uri, $preserveHost));
    }
}
