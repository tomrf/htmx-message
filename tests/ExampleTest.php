<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage\Test;

use PHPUnit\Framework\TestCase;
use Tomrf\HtmxMessage\Example;

/**
 * @internal
 * @covers Tomrf\HtmxMessage\Example
 */
final class ExampleTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        // ...
    }

    public function testExampleIsInstanceOfExample(): void
    {
        static::assertInstanceOf(Example::class, new Example());
    }

    public function testHello(): void
    {
        static::assertSame('Hello, world.', (new Example())->hello());
    }
}
