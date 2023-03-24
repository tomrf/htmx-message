<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use PHPUnit\Framework\TestCase;
use Tomrf\HtmxMessage\HtmxResponse;

/**
 * @internal
 *
 * @covers \Tomrf\HtmxMessage\HtmxResponse
 * @covers \Tomrf\HtmxMessage\Proxy\AbstractMessageInterfaceProxy
 * @covers \Tomrf\HtmxMessage\Proxy\ResponseInterfaceProxy
 */
final class HtmxResponseTest extends TestCase
{
    public function testHtmxAddedTriggerAndValue(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('first', 'value-first');
        $response = $response->withAddedHxTrigger('added', 'value-added');

        static::assertTrue($response->hasHeader('HX-Trigger'));

        static::assertSame(
            json_encode(['first' => 'value-first', 'added' => 'value-added']),
            $response->getHeaderLine('HX-Trigger')
        );

        static::assertSame(
            ['first' => 'value-first', 'added' => 'value-added'],
            $response->getHxTrigger()
        );
    }

    public function testHtmxAddedTriggerAndValueAndReplace(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('first', 'value-first');
        $response = $response->withAddedHxTrigger('added', 'value-added');
        $response = $response->withAddedHxTrigger('added', 'value-added-replace', true);

        static::assertSame(
            json_encode(['first' => 'value-first', 'added' => 'value-added-replace']),
            $response->getHeaderLine('HX-Trigger')
        );
    }

    public function testHtmxPush(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxPush('url');

        static::assertTrue($response->hasHeader('HX-Push'));

        static::assertSame(
            'url',
            $response->getHeaderLine('HX-Push')
        );
        static::assertSame('url', $response->getHxPush());
    }

    public function testHtmxRefresh(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxRefresh();

        static::assertTrue($response->hasHeader('HX-Refresh'));
        static::assertSame('true', $response->getHeaderLine('HX-Refresh'));
    }

    public function testHtmxRetargetWithSelector(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxRetarget('selector');

        static::assertTrue($response->hasHeader('HX-Retarget'));
        static::assertSame('selector', $response->getHeaderLine('HX-Retarget'));
        static::assertSame('selector', $response->getHxRetarget());
    }

    public function testHtmxTrigger(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test');

        static::assertTrue($response->hasHeader('HX-Trigger'));

        static::assertSame(
            json_encode(['test' => null]),
            $response->getHeaderLine('HX-Trigger')
        );

        static::assertSame(
            ['test' => null],
            $response->getHxTrigger()
        );
    }

    public function testHtmxTriggerWithValues(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test', 'value');

        static::assertTrue($response->hasHeader('HX-Trigger'));

        static::assertSame(
            json_encode(['test' => 'value']),
            $response->getHeaderLine('HX-Trigger')
        );

        static::assertSame(
            ['test' => 'value'],
            $response->getHxTrigger()
        );
    }

    public function testHtmxTriggerWithValuesAndAdded(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test', 'value');
        $response = $response->withAddedHxTrigger('added', 'value-added');

        static::assertSame(
            json_encode(['test' => 'value', 'added' => 'value-added']),
            $response->getHeaderLine('HX-Trigger')
        );
    }

    public function testHtmxTriggerWithValuesAndAddedAndReplace(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test', 'value');
        $response = $response->withAddedHxTrigger('added', 'value-added');
        $response = $response->withAddedHxTrigger('added', 'value-added-replace', true);

        static::assertSame(
            json_encode(['test' => 'value', 'added' => 'value-added-replace']),
            $response->getHeaderLine('HX-Trigger')
        );
    }

    public function testHtmxTriggerWithValuesAndReplace(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test', 'value');
        $response = $response->withHxTrigger('test', 'value-replace', true);

        static::assertSame(
            json_encode(['test' => 'value-replace']),
            $response->getHeaderLine('HX-Trigger')
        );
    }

    public function testHtmxTriggerWithValuesAndReplaceAndAdded(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test', 'value');
        $response = $response->withHxTrigger('test', 'value-replace', true);
        $response = $response->withAddedHxTrigger('added', 'value-added');

        static::assertSame(
            json_encode(['test' => 'value-replace', 'added' => 'value-added']),
            $response->getHeaderLine('HX-Trigger')
        );
    }

    public function testNewInstance(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        static::assertInstanceOf(HtmxResponse::class, $response);
    }
}
