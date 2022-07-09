<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class ServerRequestProxy implements ServerRequestInterface
{
    final public function __construct(
        protected ServerRequestInterface $request,
    ) {
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    // PSR-7 MessageInterface
    public function getBody()
    {
        return $this->request->getBody();
    }

    public function getProtocolVersion()
    {
        return $this->request->getProtocolVersion();
    }

    public function getHeaders()
    {
        return $this->request->getHeaders();
    }

    public function hasHeader($name)
    {
        return $this->request->hasHeader($name);
    }

    public function getHeader($name)
    {
        return $this->request->getHeader($name);
    }

    public function getHeaderLine($name)
    {
        return $this->request->getHeaderLine($name);
    }

    public function withProtocolVersion($version)
    {
        return new static($this->request->withProtocolVersion($version));
    }

    public function withHeader($name, $value)
    {
        return new static($this->request->withHeader($name, $value));
    }

    public function withAddedHeader($name, $value)
    {
        return new static($this->request->withAddedHeader($name, $value));
    }

    public function withoutHeader($name)
    {
        return new static($this->request->withoutHeader($name));
    }

    public function withBody(StreamInterface $body)
    {
        return new static($this->request->withBody($body));
    }

    // PSR-7 RequestInterface
    public function getRequestTarget()
    {
        return $this->request->getRequestTarget();
    }

    public function getMethod()
    {
        return $this->request->getMethod();
    }

    public function getUri()
    {
        return $this->request->getUri();
    }

    public function withMethod($method)
    {
        return new static($this->request->withMethod($method));
    }

    /**
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @param bool $preserveHost
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        return new static($this->request->withUri($uri, $preserveHost));
    }

    public function withRequestTarget($requestTarget)
    {
        return new static($this->request->withRequestTarget($requestTarget));
    }

    // ServerRequestInterface

    /**
     * @return array<mixed>
     */
    public function getServerParams()
    {
        return $this->request->getServerParams();
    }

    /**
     * @return array<mixed>
     */
    public function getCookieParams()
    {
        return $this->request->getCookieParams();
    }

    /**
     * @return array<mixed>
     */
    public function getQueryParams()
    {
        return $this->request->getQueryParams();
    }

    /**
     * @return array<mixed>
     */
    public function getUploadedFiles()
    {
        return $this->request->getUploadedFiles();
    }

    /**
     * @return null|array<mixed>|object
     */
    public function getParsedBody()
    {
        return $this->request->getParsedBody();
    }

    /**
     * @return array<mixed>
     */
    public function getAttributes()
    {
        return $this->request->getAttributes();
    }

    public function getAttribute($name, $default = null)
    {
        return $this->request->getAttribute($name, $default);
    }

    /**
     * @param null|array<mixed>|object $data
     */
    public function withParsedBody($data)
    {
        return new static($this->request->withParsedBody($data));
    }

    /**
     * @param array<mixed> $uploadedFiles
     */
    public function withUploadedFiles(array $uploadedFiles)
    {
        return new static($this->request->withUploadedFiles($uploadedFiles));
    }

    /**
     * @param array<mixed> $query
     */
    public function withQueryParams(array $query)
    {
        return new static($this->request->withQueryParams($query));
    }

    /**
     * @param array<mixed> $cookies
     */
    public function withCookieParams(array $cookies)
    {
        return new static($this->request->withCookieParams($cookies));
    }

    public function withAttribute($name, $value)
    {
        return new static($this->request->withAttribute($name, $value));
    }

    public function withoutAttribute($name)
    {
        return new static($this->request->withoutAttribute($name));
    }
}
