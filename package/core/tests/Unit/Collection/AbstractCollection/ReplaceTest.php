<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestIterator
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::replace */
final class ReplaceTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testConstructor(): void
    {
        $collection = new TestCollection([10, 11]);

        static::assertCount(2, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1]));
        static::assertSame(10, $collection->get(0));
        static::assertSame(11, $collection->get(1));
    }

    public function testArray(): void
    {
        $collection = (new TestCollection([1]))
            ->replace([10, 11]);

        static::assertCount(2, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1]));
        static::assertSame(10, $collection->get(0));
        static::assertSame(11, $collection->get(1));
    }

    public function testCollection(): void
    {
        $collection = (new TestCollection([1, 2]))
            ->replace(new TestCollection([10, 11]));

        static::assertCount(2, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1]));
        static::assertSame(10, $collection->get(0));
        static::assertSame(11, $collection->get(1));
    }

    public function testIterator(): void
    {
        $collection = (new TestCollection([1, 2]))
            ->replace(new TestIterator([10, 11]));

        static::assertCount(2, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1]));
        static::assertSame(10, $collection->get(0));
        static::assertSame(11, $collection->get(1));
    }

    public function testStringKey(): void
    {
        $collection = (new TestCollection([1, 2]))
            ->replace(['foo' => 'foo', '10' => '10', 'bar' => 'bar']);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection(['foo', 10, 'bar']));
        static::assertSame('foo', $collection->get('foo'));
        static::assertSame('10', $collection->get(10));
        static::assertSame('bar', $collection->get('bar'));
    }

    public function testIntegerKey(): void
    {
        $collection = (new TestCollection([1, 2]))
            ->replace([10 => 10, 30 => 30, 20 => 20]);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([10, 30, 20]));
        static::assertSame(10, $collection->get(10));
        static::assertSame(30, $collection->get(30));
        static::assertSame(20, $collection->get(20));
    }
}
