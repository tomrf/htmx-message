<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Tomrf\HtmxMessage\HtmxServerRequest;

/**
 * @covers \Tomrf\HtmxMessage\HtmxServerRequest
 * @covers \Tomrf\HtmxMessage\Proxy\AbstractMessageInterfaceProxy
 * @covers \Tomrf\HtmxMessage\Proxy\ServerRequestInterfaceProxy
 *
 * @internal
 */
final class HtmxServerRequestTest extends TestCase
{
    private static Psr17Factory $psr17Factory;
    private static ServerRequestCreator $serverRequestCreator;

    public static function setUpBeforeClass(): void
    {
        self::$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();
        self::$serverRequestCreator = new \Nyholm\Psr7Server\ServerRequestCreator(
            self::$psr17Factory,
            self::$psr17Factory,
            self::$psr17Factory,
            self::$psr17Factory
        );
    }

    public function testNewInstanceFromNonHtmxRequest(): void
    {
        self::assertFalse(
            (new HtmxServerRequest(self::createServerRequest()->withoutHeader('HX-Request')))
                ->isHxRequest()
        );
    }

    public function testNewInstanceFromServerRequest(): void
    {
        $serverRequest = self::createServerRequest();
        $htmxRequest = new HtmxServerRequest($serverRequest);

        self::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        self::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert isHxRequest
        self::assertTrue($htmxRequest->isHxRequest());

        // assert request method
        self::assertSame('GET', $serverRequest->getMethod());
        self::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        self::assertSame('/', $serverRequest->getUri()->getPath());
        self::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert protocol version change
        self::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        self::assertSame('1.0', $newRequest->getProtocolVersion());
        self::assertNotSame($htmxRequest, $newRequest);

        // assert adding attribute
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        self::assertSame(123, $newRequest->getAttribute('attr'));
        self::assertNotSame($htmxRequest, $newRequest);

        // assert manipulating body content
        $newRequest->getBody()->write('foo');
        $newRequest->getBody()->rewind();
        self::assertSame('foo', $newRequest->getBody()->getContents());
    }

    public function testNewInstanceFromServerRequestWithBody(): void
    {
        $serverRequest = self::createServerRequest('POST', '/', 'foo');
        $htmxRequest = new HtmxServerRequest($serverRequest);

        self::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        self::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert isHxRequest
        self::assertTrue($htmxRequest->isHxRequest());

        // assert request method
        self::assertSame('POST', $serverRequest->getMethod());
        self::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        self::assertSame('/', $serverRequest->getUri()->getPath());
        self::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert protocol version change
        self::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        self::assertSame('1.0', $newRequest->getProtocolVersion());
        self::assertNotSame($htmxRequest, $newRequest);

        // assert adding attribute
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        self::assertSame(123, $newRequest->getAttribute('attr'));
        self::assertNotSame($htmxRequest, $newRequest);
    }

    public function testNewInstanceFromServerRequestWithBodyAndQueryParams(): void
    {
        $serverRequest = self::createServerRequest('POST', '/?foo=bar', 'foo=bar');
        $htmxRequest = new HtmxServerRequest($serverRequest);

        self::assertInstanceOf(ServerRequestInterface::class, $serverRequest);
        self::assertInstanceOf(ServerRequestInterface::class, $htmxRequest);

        // assert isHxRequest
        self::assertTrue($htmxRequest->isHxRequest());

        // assert request method
        self::assertSame('POST', $serverRequest->getMethod());
        self::assertSame($serverRequest->getMethod(), $htmxRequest->getMethod());

        // assert request uri path
        self::assertSame('/', $serverRequest->getUri()->getPath());
        self::assertSame($serverRequest->getUri(), $htmxRequest->getUri());

        // assert protocol version change
        self::assertSame('1.1', $htmxRequest->getProtocolVersion());
        $newRequest = $htmxRequest->withProtocolVersion('1.0');
        self::assertSame('1.0', $newRequest->getProtocolVersion());
        self::assertNotSame($htmxRequest, $newRequest);

        // assert adding attribute
        $newRequest = $htmxRequest->withAttribute('attr', 123);
        self::assertSame(123, $newRequest->getAttribute('attr'));
        self::assertNotSame($htmxRequest, $newRequest);
    }

    private static function createServerRequest(string $method = 'GET', string $uri = '/', ?string $body = null): ServerRequestInterface
    {
        return self::$serverRequestCreator->fromArrays(
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
