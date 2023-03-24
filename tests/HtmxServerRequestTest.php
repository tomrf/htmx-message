<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Tomrf\HtmxMessage\HtmxServerRequest;

/**
 * @internal
 *
 * @covers \Tomrf\HtmxMessage\HtmxServerRequest
 * @covers \Tomrf\HtmxMessage\Proxy\AbstractMessageInterfaceProxy
 * @covers \Tomrf\HtmxMessage\Proxy\ServerRequestInterfaceProxy
 */
final class HtmxServerRequestTest extends TestCase
{
    private static Psr17Factory $psr17Factory;
    private static ServerRequestCreator $serverRequestCreator;

    public static function setUpBeforeClass(): void
    {
        static::$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();
        static::$serverRequestCreator = new \Nyholm\Psr7Server\ServerRequestCreator(
            static::$psr17Factory,
            static::$psr17Factory,
            static::$psr17Factory,
            static::$psr17Factory
        );
    }

    public function testNewInstanceFromNonHtmxRequest(): void
    {
        static::assertFalse(
            (new HtmxServerRequest(static::createServerRequest()->withoutHeader('HX-Request')))
                ->isHxRequest()
        );
    }

    public function testNewInstanceFromServerRequest(): void
    {
        $serverRequest = static::createServerRequest();
        $htmxRequest = new HtmxServerRequest($serverRequest);

        static::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        static::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert isHxRequest
        static::assertTrue($htmxRequest->isHxRequest());

        // assert request method
        static::assertSame('GET', $serverRequest->getMethod());
        static::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        static::assertSame('/', $serverRequest->getUri()->getPath());
        static::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert protocol version change
        static::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        static::assertSame('1.0', $newRequest->getProtocolVersion());
        static::assertNotSame($htmxRequest, $newRequest);

        // assert adding attribute
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        static::assertSame(123, $newRequest->getAttribute('attr'));
        static::assertNotSame($htmxRequest, $newRequest);

        // assert manipulating body content
        $newRequest->getBody()->write('foo');
        $newRequest->getBody()->rewind();
        static::assertSame('foo', $newRequest->getBody()->getContents());
    }

    public function testNewInstanceFromServerRequestWithBody(): void
    {
        $serverRequest = static::createServerRequest('POST', '/', 'foo');
        $htmxRequest = new HtmxServerRequest($serverRequest);

        static::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        static::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert isHxRequest
        static::assertTrue($htmxRequest->isHxRequest());

        // assert request method
        static::assertSame('POST', $serverRequest->getMethod());
        static::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        static::assertSame('/', $serverRequest->getUri()->getPath());
        static::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert protocol version change
        static::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        static::assertSame('1.0', $newRequest->getProtocolVersion());
        static::assertNotSame($htmxRequest, $newRequest);

        // assert adding attribute
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        static::assertSame(123, $newRequest->getAttribute('attr'));
        static::assertNotSame($htmxRequest, $newRequest);

        // assert manipulating body content
        $newRequest->getBody()->write('bar');
        $newRequest->getBody()->rewind();
        static::assertSame('foobar', $newRequest->getBody()->getContents());
    }

    public function testNewInstanceFromServerRequestWithBodyAndQueryParams(): void
    {
        $serverRequest = static::createServerRequest('POST', '/?foo=bar', 'foo=bar');
        $htmxRequest = new HtmxServerRequest($serverRequest);

        static::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        static::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert isHxRequest
        static::assertTrue($htmxRequest->isHxRequest());

        // assert request method
        static::assertSame('POST', $serverRequest->getMethod());
        static::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        static::assertSame('/', $serverRequest->getUri()->getPath());
        static::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert protocol version change
        static::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        static::assertSame('1.0', $newRequest->getProtocolVersion());
        static::assertNotSame($htmxRequest, $newRequest);

        // assert adding attribute
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        static::assertSame(123, $newRequest->getAttribute('attr'));
        static::assertNotSame($htmxRequest, $newRequest);
    }

    private static function createServerRequest(string $method = 'GET', string $uri = '/', ?string $body = null): ServerRequestInterface
    {
        return static::$serverRequestCreator->fromArrays(
            [
                'REQUEST_METHOD' => $method,
                'REQUEST_URI' => $uri,
                'SERVER_PROTOCOL' => '1.1',
                'SERVER_NAME' => 'localhost',
                'SERVER_PORT' => '80',
                'REMOTE_ADDR' => '::1',
                'REMOTE_PORT' => '58981',
                'SERVER_ADDR' => '::1',
            ],
            [
                'HX-Request' => 'true',
                'Accept' => 'text/html',
                'Accept-Charset' => 'utf-8',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Cache-Control' => 'no-cache',
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',
            ],
            $_COOKIE,
            $_GET,
            $_POST,
            $_FILES,
            $body
        );
    }
}
