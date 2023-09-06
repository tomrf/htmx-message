<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use PHPUnit\Framework\TestCase;
use Tomrf\HtmxMessage\HtmxResponse;

/**
 * @covers \Tomrf\HtmxMessage\HtmxResponse
 * @covers \Tomrf\HtmxMessage\Proxy\AbstractMessageInterfaceProxy
 * @covers \Tomrf\HtmxMessage\Proxy\ResponseInterfaceProxy
 *
 * @internal
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

        self::assertTrue($response->hasHeader('HX-Trigger'));

        self::assertSame(
            json_encode(['first' => 'value-first', 'added' => 'value-added']),
            $response->getHeaderLine('HX-Trigger')
        );

        self::assertSame(
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

        self::assertSame(
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

        self::assertTrue($response->hasHeader('HX-Push'));

        self::assertSame(
            'url',
            $response->getHeaderLine('HX-Push')
        );
        self::assertSame('url', $response->getHxPush());
    }

    public function testHtmxRefresh(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxRefresh();

        self::assertTrue($response->hasHeader('HX-Refresh'));
        self::assertSame('true', $response->getHeaderLine('HX-Refresh'));
    }

    public function testHtmxRetargetWithSelector(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxRetarget('selector');

        self::assertTrue($response->hasHeader('HX-Retarget'));
        self::assertSame('selector', $response->getHeaderLine('HX-Retarget'));
        self::assertSame('selector', $response->getHxRetarget());
    }

    public function testHtmxTrigger(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxTrigger('test');

        self::assertTrue($response->hasHeader('HX-Trigger'));

        self::assertSame(
            json_encode(['test' => null]),
            $response->getHeaderLine('HX-Trigger')
        );

        self::assertSame(
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

        self::assertTrue($response->hasHeader('HX-Trigger'));

        self::assertSame(
            json_encode(['test' => 'value']),
            $response->getHeaderLine('HX-Trigger')
        );

        self::assertSame(
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

        self::assertSame(
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

        self::assertSame(
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

        self::assertSame(
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

        self::assertSame(
            json_encode(['test' => 'value-replace', 'added' => 'value-added']),
            $response->getHeaderLine('HX-Trigger')
        );
    }

    public function testNewInstance(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        self::assertInstanceOf(HtmxResponse::class, $response);
    }
}
