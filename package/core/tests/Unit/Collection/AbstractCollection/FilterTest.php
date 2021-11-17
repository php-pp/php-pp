<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::filter */
final class FilterTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(
            0,
            (new TestCollection())->filter(
                function (): void {
                }
            )
        );
    }

    public function testOneValue(): void
    {
        $collection = new TestCollection([10 => 'foo']);

        $collection->filter(
            function (): bool {
                return true;
            }
        );

        static::assertCount(1, $collection);
        static::assertSame('foo', $collection->get(10));
    }

    public function testThreeValues(): void
    {
        $collection = new TestCollection([10 => 'foo', 'bar' => 'baz', 5 => 42]);

        $collection->filter(
            function (): bool {
                return true;
            }
        );

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([10, 'bar', 5]));
        static::assertSame('foo', $collection->get(10));
        static::assertSame('baz', $collection->get('bar'));
        static::assertSame(42, $collection->get(5));
    }

    public function testClearWithOneValue(): void
    {
        $collection = new TestCollection(['foo']);

        $collection->filter(
            function (): bool {
                return false;
            }
        );

        static::assertCount(0, $collection);
    }

    public function testClearWithTreeValue(): void
    {
        $collection = new TestCollection(['foo', 'bar', 'baz']);

        $collection->filter(
            function (): bool {
                return false;
            }
        );

        static::assertCount(0, $collection);
    }

    public function testFilter(): void
    {
        $collection = new TestCollection([10 => 'foo', 'bar' => 'baz', 5 => '42']);

        $collection->filter(
            function (string $value): bool {
                return $value === 'baz';
            }
        );

        static::assertCount(1, $collection);
        static::assertSame('baz', $collection->get('bar'));
    }

    public function testCallbackArguments(): void
    {
        $collection = new TestCollection(['foo']);

        $collection->filter(
            function (): bool {
                static::assertCount(1, func_get_args());
                static::assertSame('foo', func_get_args()[0]);

                return true;
            }
        );
    }

    public function testModeKey(): void
    {
        $collection = new TestCollection(['foo' => 'bar']);

        $collection->filter(
            function (): bool {
                static::assertCount(1, func_get_args());
                static::assertSame('foo', func_get_args()[0]);

                return true;
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    public function testModeBoth(): void
    {
        $collection = new TestCollection(['foo' => 'bar']);

        $collection->filter(
            function (): bool {
                static::assertCount(2, func_get_args());
                static::assertSame('bar', func_get_args()[0]);
                static::assertSame('foo', func_get_args()[1]);

                return true;
            },
            ARRAY_FILTER_USE_BOTH
        );
    }
}
