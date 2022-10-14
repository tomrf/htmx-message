<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use PHPUnit\Framework\TestCase;
use Tomrf\HtmxMessage\HtmxResponse;

/**
 * @internal
 * @cover HtmxResponse
 * @coversNothing
 */
final class HtmxResponseTest extends TestCase
{
    public function testNewInstance(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        static::assertInstanceOf(HtmxResponse::class, $response);
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

    public function testHtmxRefresh(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxRefresh();

        static::assertTrue($response->hasHeader('HX-Refresh'));
        static::assertSame('true', $response->getHeaderLine('HX-Refresh'));
    }

    public function testHtmxRetargethWithSelector(): void
    {
        $response = new HtmxResponse(
            new \Nyholm\Psr7\Response(),
        );
        $response = $response->withHxRetarget('selector');

        static::assertTrue($response->hasHeader('HX-Retarget'));
        static::assertSame('selector', $response->getHeaderLine('HX-Retarget'));
        static::assertSame('selector', $response->getHxRetarget());

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
}
