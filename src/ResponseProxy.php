<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

 /**
  * @internal
  */
 class ResponseProxy implements ResponseInterface
 {
     /**
      * @internal
      */
     final public function __construct(
         protected ResponseInterface $response,
     ) {
     }

     /**
      * @internal
      */
     public function getResponse(): ResponseInterface
     {
         return $this->response;
     }

     // PSR-7 ResponseInterface

     /**
      * @internal
      */
     public function getStatusCode()
     {
         return $this->response->getStatusCode();
     }

     /**
      * @internal
      */
     public function getReasonPhrase()
     {
         return $this->response->getReasonPhrase();
     }

     /**
      * @internal
      *
      * @param int $code
      * @param string $reasonPhrase
      */
     public function withStatus($code, $reasonPhrase = '')
     {
         return new static($this->response->withStatus($code, $reasonPhrase));
     }

     // PSR-7 MessageInterface

     /**
      * @internal
      *
      * @param string $name
      */
     public function hasHeader($name)
     {
         return $this->response->hasHeader($name);
     }

     /**
      * @internal
      */
     public function getBody()
     {
         return $this->response->getBody();
     }

     /**
      * @internal
      */
     public function getProtocolVersion()
     {
         return $this->response->getProtocolVersion();
     }

     /**
      * @internal
      */
     public function getHeaders()
     {
         return $this->response->getHeaders();
     }

     /**
      * @internal
      *
      * @param string $name
      */
     public function getHeader($name)
     {
         return $this->response->getHeader($name);
     }

     /**
      * @internal
      *
      * @param string $name
      */
     public function getHeaderLine($name)
     {
         return $this->response->getHeaderLine($name);
     }

     /**
      * @internal
      *
      * @param string $version
      */
     public function withProtocolVersion($version)
     {
         return new static($this->response->withProtocolVersion($version));
     }

     /**
      * @internal
      *
      * @param string $name
      * @param array<string>|string $value
      */
     public function withHeader($name, $value)
     {
         return new static($this->response->withHeader($name, $value));
     }

     /**
      * @internal
      *
      * @param string $name
      * @param array<string>|string $value
      */
     public function withAddedHeader($name, $value)
     {
         return new static($this->response->withAddedHeader($name, $value));
     }

     /**
      * @internal
      */
     public function withBody(StreamInterface $body)
     {
         return new static($this->response->withBody($body));
     }

     /**
      * @internal
      *
      * @param string $name
      */
     public function withoutHeader($name)
     {
         return new static($this->response->withoutHeader($name));
     }
 }
