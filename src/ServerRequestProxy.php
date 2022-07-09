<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * @internal
 */
class ServerRequestProxy implements ServerRequestInterface
{
    /**
     * @internal
     */
    final public function __construct(
        protected ServerRequestInterface $request,
    ) {
    }

    /**
     * @internal
     */
    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    // PSR-7 MessageInterface
    /**
     * @internal
     */
    public function getBody()
    {
        return $this->request->getBody();
    }

    /**
     * @internal
     */
    public function getProtocolVersion()
    {
        return $this->request->getProtocolVersion();
    }

    /**
     * @internal
     */
    public function getHeaders()
    {
        return $this->request->getHeaders();
    }

    /**
     * @internal
     *
     * @param mixed $name
     */
    public function hasHeader($name)
    {
        return $this->request->hasHeader($name);
    }

    /**
     * @internal
     *
     * @param mixed $name
     */
    public function getHeader($name)
    {
        return $this->request->getHeader($name);
    }

    /**
     * @internal
     *
     * @param mixed $name
     */
    public function getHeaderLine($name)
    {
        return $this->request->getHeaderLine($name);
    }

    /**
     * @internal
     *
     * @param mixed $version
     */
    public function withProtocolVersion($version)
    {
        return new static($this->request->withProtocolVersion($version));
    }

    /**
     * @internal
     *
     * @param mixed $name
     * @param mixed $value
     */
    public function withHeader($name, $value)
    {
        return new static($this->request->withHeader($name, $value));
    }

    /**
     * @internal
     *
     * @param mixed $name
     * @param mixed $value
     */
    public function withAddedHeader($name, $value)
    {
        return new static($this->request->withAddedHeader($name, $value));
    }

    /**
     * @internal
     *
     * @param mixed $name
     */
    public function withoutHeader($name)
    {
        return new static($this->request->withoutHeader($name));
    }

    /**
     * @internal
     */
    public function withBody(StreamInterface $body)
    {
        return new static($this->request->withBody($body));
    }

    // PSR-7 RequestInterface
    /**
     * @internal
     */
    public function getRequestTarget()
    {
        return $this->request->getRequestTarget();
    }

    /**
     * @internal
     */
    public function getMethod()
    {
        return $this->request->getMethod();
    }

    /**
     * @internal
     */
    public function getUri()
    {
        return $this->request->getUri();
    }

    /**
     * @internal
     *
     * @param mixed $method
     */
    public function withMethod($method)
    {
        return new static($this->request->withMethod($method));
    }

    /**
     * @internal
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @param bool $preserveHost
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        return new static($this->request->withUri($uri, $preserveHost));
    }

    /**
     * @internal
     *
     * @param mixed $requestTarget
     */
    public function withRequestTarget($requestTarget)
    {
        return new static($this->request->withRequestTarget($requestTarget));
    }

    // ServerRequestInterface

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getServerParams()
    {
        return $this->request->getServerParams();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getCookieParams()
    {
        return $this->request->getCookieParams();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getQueryParams()
    {
        return $this->request->getQueryParams();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getUploadedFiles()
    {
        return $this->request->getUploadedFiles();
    }

    /**
     * @internal
     *
     * @return null|array<mixed>|object
     */
    public function getParsedBody()
    {
        return $this->request->getParsedBody();
    }

    /**
     * @internal
     *
     * @return array<mixed>
     */
    public function getAttributes()
    {
        return $this->request->getAttributes();
    }

    /**
     * @internal
     *
     * @param mixed      $name
     * @param null|mixed $default
     */
    public function getAttribute($name, $default = null)
    {
        return $this->request->getAttribute($name, $default);
    }

    /**
     * @internal
     *
     * @param null|array<mixed>|object $data
     */
    public function withParsedBody($data)
    {
        return new static($this->request->withParsedBody($data));
    }

    /**
     * @internal
     *
     * @param array<mixed> $uploadedFiles
     */
    public function withUploadedFiles(array $uploadedFiles)
    {
        return new static($this->request->withUploadedFiles($uploadedFiles));
    }

    /**
     * @internal
     *
     * @param array<mixed> $query
     */
    public function withQueryParams(array $query)
    {
        return new static($this->request->withQueryParams($query));
    }

    /**
     * @internal
     *
     * @param array<mixed> $cookies
     */
    public function withCookieParams(array $cookies)
    {
        return new static($this->request->withCookieParams($cookies));
    }

    /**
     * @internal
     *
     * @param mixed $name
     * @param mixed $value
     */
    public function withAttribute($name, $value)
    {
        return new static($this->request->withAttribute($name, $value));
    }

    /**
     * @internal
     *
     * @param mixed $name
     */
    public function withoutAttribute($name)
    {
        return new static($this->request->withoutAttribute($name));
    }
}