<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class HtmxResponse implements ResponseInterface
{
    final public function __construct(
        protected ResponseInterface $response,
    ) {
    }

    // HtmxResponse
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    // withHxRedirect
    public function withHxRedirect(string $url): static
    {
        return $this->withHeader('HX-Redirect', $url);
    }

    // ResponseInterface
    public function getStatusCode() {
        return $this->response->getStatusCode();
    }
    public function getReasonPhrase() {
        return $this->response->getReasonPhrase();
    }
    public function withStatus($code, $reasonPhrase = '') {
        return new static($this->response->withStatus($code, $reasonPhrase));
    }


    // MessageInterface
    public function hasHeader($name) {
        return $this->response->hasHeader($name);
    }
    public function getBody() {
        return $this->response->getBody();
    }
    public function getProtocolVersion() {
        return $this->response->getProtocolVersion();
    }
    public function getHeaders() {
        return $this->response->getHeaders();
    }
    public function getHeader($name) {
        return $this->response->getHeader($name);
    }
    public function getHeaderLine($name) {
        return $this->response->getHeaderLine($name);
    }
    public function withProtocolVersion($version) {
        return new static($this->response->withProtocolVersion($version));
    }
    public function withHeader($name, $value) {
        return new static($this->response->withHeader($name, $value));
    }
    public function withAddedHeader($name, $value) {
        return new static($this->response->withAddedHeader($name, $value));
    }
    public function withBody(StreamInterface $body) {
        return new static($this->response->withBody($body));
    }
    public function withoutHeader($name) {
        return new static($this->response->withoutHeader($name));
    }


}
