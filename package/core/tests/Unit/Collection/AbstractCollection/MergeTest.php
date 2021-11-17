<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Contract\Collection\CollectionInterface;
use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Exception\Collection\InvalidPreserveKeysException,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestIterator,
    Tests\Unit\Collection\TestToArray
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::merge */
final class MergeTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->merge([]));
    }

    public function testArray(): void
    {
        $collection1 = new TestCollection([10, 'foo', 11]);
        $collection2 = [
            1,
            1.2,
            'foo',
            true,
            false,
            ['bar'],
            new \stdClass()
        ];
        $collection1->merge($collection2);

        static::assertCount(10, $collection1);
        static::assertKeysOrder($collection1, new ScalarCollection([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]));
        static::assertSame(10, $collection1->get(0));
        static::assertSame('foo', $collection1->get(1));
        static::assertSame(11, $collection1->get(2));
        static::assertSame(1, $collection1->get(3));
        static::assertSame(1.2, $collection1->get(4));
        static::assertSame('foo', $collection1->get(5));
        static::assertTrue($collection1->get(6));
        static::assertFalse($collection1->get(7));
        static::assertSame(['bar'], $collection1->get(8));
        static::assertInstanceOf(\stdClass::class, $collection1->get(9));
    }

    public function testToArrayInterface(): void
    {
        $collection = (new TestCollection([10, 'foo', 11]))
            ->merge(new TestToArray());

        static::assertCount(10, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]));
        static::assertSame(10, $collection->get(0));
        static::assertSame('foo', $collection->get(1));
        static::assertSame(11, $collection->get(2));
        static::assertSame(1, $collection->get(3));
        static::assertSame(1.2, $collection->get(4));
        static::assertSame('foo', $collection->get(5));
        static::assertTrue($collection->get(6));
        static::assertFalse($collection->get(7));
        static::assertSame(['bar'], $collection->get(8));
        static::assertInstanceOf(\stdClass::class, $collection->get(9));
    }

    public function testIterator(): void
    {
        $collection = (new TestCollection([10, 11, 12]))
            ->merge(new TestIterator());

        static::assertCount(9, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2, 3, 4, 5, 6, 7, 8]));
        static::assertSame(10, $collection->get(0));
        static::assertSame(11, $collection->get(1));
        static::assertSame(12, $collection->get(2));
        static::assertSame(1, $collection->get(3));
        static::assertSame(1.2, $collection->get(4));
        static::assertSame('foo', $collection->get(5));
        static::assertTrue($collection->get(6));
        static::assertSame(['bar'], $collection->get(7));
        static::assertInstanceOf(\stdClass::class, $collection->get(8));
    }

    public function testPreserveNoKeys(): void
    {
        $collection = (new TestCollection([10 => 10, 'foo' => 'foo', 20 => 20]))
            ->callDoAdd(21)
            ->merge([40 => 40, 'bar' => 'bar', 'foo' => 'baz', 5 => 5]);

        static::assertCount(8, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2, 3, 4, 5, 6, 7]));
        static::assertSame(10, $collection->get(0));
        static::assertSame('foo', $collection->get(1));
        static::assertSame(20, $collection->get(2));
        static::assertSame(21, $collection->get(3));
        static::assertSame(40, $collection->get(4));
        static::assertSame('bar', $collection->get(5));
        static::assertSame('baz', $collection->get(6));
        static::assertSame(5, $collection->get(7));
    }

    public function testPreserveAssociativeKeys(): void
    {
        $collection = (new TestCollection([10 => 10, 'foo' => 'foo', 20 => 20]))
            ->callDoAdd(21)
            ->merge(
                [40 => 40, 'bar' => 'bar', 'foo' => 'baz', 5 => 5],
                CollectionInterface::MERGE_PRESERVE_ASSOCIATIVE_KEYS
            );

        static::assertCount(7, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 'foo', 1, 2, 3, 'bar', 4]));
        static::assertSame(10, $collection->get(0));
        static::assertSame('baz', $collection->get('foo'));
        static::assertSame(20, $collection->get(1));
        static::assertSame(21, $collection->get(2));
        static::assertSame(40, $collection->get(3));
        static::assertSame('bar', $collection->get('bar'));
        static::assertSame(5, $collection->get(4));
    }

    public function testPreserveAllKeys(): void
    {
        $collection = (new TestCollection([10 => 10, 'foo' => 'foo', 20 => 20]))
            ->callDoAdd(21)
            ->merge(
                [20 => 200, 'bar' => 'bar', 'foo' => 'baz', 5 => 5],
                CollectionInterface::MERGE_PRESERVE_ALL_KEYS
            );

        static::assertCount(6, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([10, 'foo', 20, 21, 'bar', 5]));
        static::assertSame(10, $collection->get(10));
        static::assertSame('baz', $collection->get('foo'));
        static::assertSame(200, $collection->get(20));
        static::assertSame(21, $collection->get(21));
        static::assertSame('bar', $collection->get('bar'));
        static::assertSame(5, $collection->get(5));
    }

    public function testInvalidPreserveKeys(): void
    {
        $this->expectException(InvalidPreserveKeysException::class);
        $this->expectExceptionMessage('Invalid preserve keys type "9999".');
        $this->expectExceptionCode(0);
        (new TestCollection())->merge([], 9999);
    }
}
