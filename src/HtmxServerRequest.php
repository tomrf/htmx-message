<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class HtmxServerRequest implements ServerRequestInterface
{
    public function __construct(
        protected ServerRequestInterface $request,
    ) {
    }

    // HtmxServerRequest
    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    public function getHxTrigger(): string
    {
        return $this->request->getHeaderLine('X-HX-Trigger');
    }

    public function getHxTriggerName(): string
    {
        return $this->request->getHeaderLine('X-HX-TriggerName');
    }

    public function getHxTarget(): string
    {
        return $this->request->getHeaderLine('X-HX-Target');
    }

    public function getHxPrompt(): string
    {
        return $this->request->getHeaderLine('X-HX-Prompt');
    }

    // MessageInterface
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

    // RequestInterface
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

    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        return new static($this->request->withUri($uri, $preserveHost));
    }

    public function withRequestTarget($requestTarget)
    {
        return new static($this->request->withRequestTarget($requestTarget));
    }

    // ServerRequestInterface
    public function getServerParams()
    {
        return $this->request->getServerParams();
    }

    public function getCookieParams()
    {
        return $this->request->getCookieParams();
    }

    public function getQueryParams()
    {
        return $this->request->getQueryParams();
    }

    public function getUploadedFiles()
    {
        return $this->request->getUploadedFiles();
    }

    public function getParsedBody()
    {
        return $this->request->getParsedBody();
    }

    public function getAttributes()
    {
        return $this->request->getAttributes();
    }

    public function getAttribute($name, $default = null)
    {
        return $this->request->getAttribute($name, $default);
    }

    public function withParsedBody($data)
    {
        return new static($this->request->withParsedBody($data));
    }

    public function withUploadedFiles(array $uploadedFiles)
    {
        return new static($this->request->withUploadedFiles($uploadedFiles));
    }

    public function withQueryParams(array $query)
    {
        return new static($this->request->withQueryParams($query));
    }

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
