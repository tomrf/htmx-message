<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Tomrf\HtmxMessage\HtmxServerRequest;

/**
 * @internal
 * @covers \Tomrf\HtmxMessage\HtmxServerRequest
 */
final class HtmxServerRequestTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        // ...
    }

    public function testNewInstanceFromServerRequest(): void
    {
        $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

        $creator = new \Nyholm\Psr7Server\ServerRequestCreator(
            $psr17Factory,
            $psr17Factory,
            $psr17Factory,
            $psr17Factory
        );

        $serverRequest = $creator->fromArrays(
            [
                'HTTP_HOST' => 'example.com',
                'REQUEST_URI' => '/',
                'REQUEST_METHOD' => 'GET'
            ],
            [
                'host' => 'example.com',
                'accept' => 'text/html',
                'hx-request' => 'true',
            ],
            [],
            [],
            [],
            [],
            ''
        );
        $htmxRequest = new HtmxServerRequest($serverRequest);

        static::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        static::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert request method
        static::assertSame('GET', $serverRequest->getMethod());
        static::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        static::assertSame('/', $serverRequest->getUri()->getPath());
        static::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert request host header
        static::assertSame('example.com', $serverRequest->getHeader('Host')[0]);
        static::assertSame($serverRequest->getHeader('Host'), $htmxRequest->getHeader('Host'));

        // assert protocol version change
        static::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        static::assertSame('1.0', $newRequest->getProtocolVersion());
        static::assertNotSame($htmxRequest, $newRequest);

        // assert manipulating body and adding attribute
        static::assertSame('', $htmxRequest->getBody()->getContents());
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        $newRequest->getBody()->write('foo');
        $newRequest->getBody()->rewind();
        static::assertSame('foo', $newRequest->getBody()->getContents());
        static::assertSame(123, $newRequest->getAttribute('attr'));
        static::assertNotSame($htmxRequest, $newRequest);
    }

    public function testNewInstanceFromNonHtmxRequestThrowsException(): void
    {
        $this->expectException(\RuntimeException::class);

        $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

        $creator = new \Nyholm\Psr7Server\ServerRequestCreator(
            $psr17Factory,
            $psr17Factory,
            $psr17Factory,
            $psr17Factory
        );

        $serverRequest = $creator->fromArrays(
            [
                'HTTP_HOST' => 'example.com',
                'REQUEST_URI' => '/',
                'REQUEST_METHOD' => 'GET',
            ],
            [],
            [],
            [],
            [],
            [],
            ''
        );

        $htmxRequest = new HtmxServerRequest($serverRequest);
    }

}
