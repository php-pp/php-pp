<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Exception\Collection\InvalidSortOrderException,
    Exception\Collection\ReadOnlyException,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::sort */
final class SortTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->sort());
    }

    public function testReadOnly(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(true);

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $collection->sort();
    }

    public function testInvalidSortOrder(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidSortOrderException::class);
        $this->expectExceptionMessage('Invalid sort order "0".');
        $this->expectExceptionCode(0);
        $collection->sort(0);
    }

    public function testAscending(): void
    {
        $collection = new TestCollection([0 => 1, 1 => 3, 2 => 2]);
        $collection->sort(TestCollection::ORDER_ASCENDING, false);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame(1, $collection->get(0));
        static::assertSame(2, $collection->get(1));
        static::assertSame(3, $collection->get(2));
    }

    public function testAscendingFlag(): void
    {
        $collection = new TestCollection([1, 3, 2, 'foo', 4]);
        $collection->sort(TestCollection::ORDER_ASCENDING, false, SORT_NUMERIC);

        static::assertCount(5, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2, 3, 4]));
        static::assertSame('foo', $collection->get(0));
        static::assertSame(1, $collection->get(1));
        static::assertSame(2, $collection->get(2));
        static::assertSame(3, $collection->get(3));
        static::assertSame(4, $collection->get(4));
    }

    public function testAscendingPreserveKeys(): void
    {
        $collection = new TestCollection([0 => 1, 1 => 3, 2 => 2]);
        $collection->sort(TestCollection::ORDER_ASCENDING, true);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 2, 1]));
        static::assertSame(1, $collection->get(0));
        static::assertSame(2, $collection->get(2));
        static::assertSame(3, $collection->get(1));
    }

    public function testDescending(): void
    {
        $collection = new TestCollection([0 => 1, 1 => 3, 2 => 2]);
        $collection->sort(TestCollection::ORDER_DESCENDING, false);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame(3, $collection->get(0));
        static::assertSame(2, $collection->get(1));
        static::assertSame(1, $collection->get(2));
    }

    public function testDescendingFlag(): void
    {
        $collection = new TestCollection([1, 3, 2, 'foo', 4]);
        $collection->sort(TestCollection::ORDER_DESCENDING, false, SORT_NUMERIC);

        static::assertCount(5, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2, 3, 4]));
        static::assertSame(4, $collection->get(0));
        static::assertSame(3, $collection->get(1));
        static::assertSame(2, $collection->get(2));
        static::assertSame(1, $collection->get(3));
        static::assertSame('foo', $collection->get(4));
    }

    public function testDescendingPreserveKeys(): void
    {
        $collection = new TestCollection([0 => 1, 1 => 3, 2 => 2]);
        $collection->sort(TestCollection::ORDER_DESCENDING, true);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([1, 2, 0]));
        static::assertSame(3, $collection->get(1));
        static::assertSame(2, $collection->get(2));
        static::assertSame(1, $collection->get(0));
    }
}
