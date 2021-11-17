<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::changeKeyCase */
final class ChangeKeyCaseTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testDefaultParameters(): void
    {
        $collection = new TestCollection(['foo' => 1]);

        $collection->changeKeyCase();

        static::assertCount(1, $collection);
        static::assertTrue($collection->hasKey('foo'));
        static::assertSame(1, $collection->get('foo'));
    }

    public function testLowerCaseAssociativesKeys(): void
    {
        $collection = new TestCollection(['foo' => 1, 'BaR' => 2, 'BAZ' => 3]);

        $collection->changeKeyCase(CASE_LOWER);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection(['foo', 'bar', 'baz']));
        static::assertSame(1, $collection->get('foo'));
        static::assertSame(2, $collection->get('bar'));
        static::assertSame(3, $collection->get('baz'));
        static::assertTrue($collection->valid());
        static::assertSame(1, $collection->current());
    }

    public function testUpperCaseAssociativesKeys(): void
    {
        $collection = new TestCollection(['foo' => 1, 'BaR' => 2, 'BAZ' => 3]);

        $collection->changeKeyCase(CASE_UPPER);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection(['FOO', 'BAR', 'BAZ']));
        static::assertSame(1, $collection->get('FOO'));
        static::assertSame(2, $collection->get('BAR'));
        static::assertSame(3, $collection->get('BAZ'));
        static::assertTrue($collection->valid());
        static::assertSame(1, $collection->current());
    }

    public function testLowerCaseIndexedKeys(): void
    {
        $collection = new TestCollection([0 => 1, 10 => 2, 20 => 3]);

        $collection->changeKeyCase(CASE_LOWER);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 10, 20]));
        static::assertSame(1, $collection->get(0));
        static::assertSame(2, $collection->get(10));
        static::assertSame(3, $collection->get(20));
        static::assertTrue($collection->valid());
        static::assertSame(1, $collection->current());
    }

    public function testUpperCaseIndexedKeys(): void
    {
        $collection = new TestCollection([0 => 1, 10 => 2, 20 => 3]);

        $collection->changeKeyCase(CASE_UPPER);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 10, 20]));
        static::assertSame(1, $collection->get(0));
        static::assertSame(2, $collection->get(10));
        static::assertSame(3, $collection->get(20));
        static::assertTrue($collection->valid());
        static::assertSame(1, $collection->current());
    }

    public function testEmpty(): void
    {
        $collection = new TestCollection();

        static::assertCount(0, $collection);

        $collection->changeKeyCase();

        static::assertCount(0, $collection);
        static::assertFalse($collection->valid());
    }
}
