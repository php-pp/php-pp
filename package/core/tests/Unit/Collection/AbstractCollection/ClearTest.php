<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\ReadOnlyException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::clear */
final class ClearTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();

        static::assertCount(0, $collection);

        $collection->clear();

        static::assertCount(0, $collection);
        static::assertFalse($collection->valid());

        $collection->callDoAdd(1);

        static::assertCount(1, $collection);
        static::assertSame(1, $collection->get(0));
        static::assertTrue($collection->valid());
        static::assertSame(1, $collection->current());
    }

    public function testOneItem(): void
    {
        $collection = new TestCollection([1]);

        static::assertCount(1, $collection);

        $collection->clear();

        static::assertCount(0, $collection);
        static::assertFalse($collection->valid());

        $collection->callDoAdd(2);

        static::assertCount(1, $collection);
        static::assertTrue($collection->valid());
        static::assertSame(2, $collection->current());
    }

    public function testThreeItem(): void
    {
        $collection = new TestCollection([1, 2, 3]);

        static::assertCount(3, $collection);

        $collection->clear();

        static::assertCount(0, $collection);
        static::assertFalse($collection->valid());

        $collection->callDoAdd(4);

        static::assertCount(1, $collection);
        static::assertSame(4, $collection->get(0));
        static::assertTrue($collection->valid());
        static::assertSame(4, $collection->current());
    }

    public function testReadOnly(): void
    {
        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $this->expectExceptionCode(0);
        (new TestCollection())->setReadOnly()->clear();
    }
}
