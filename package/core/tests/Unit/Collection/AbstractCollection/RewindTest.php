<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::rewind */
final class RewindTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();
        static::assertFalse($collection->valid());

        $collection->rewind();
        static::assertFalse($collection->valid());
    }

    public function testIntegerKeys(): void
    {
        $collection = new TestCollection([1, '2']);
        static::assertSame(0, $collection->key());

        $collection->next();
        static::assertSame(1, $collection->key());

        $collection->rewind();
        static::assertTrue($collection->valid());
        static::assertSame(0, $collection->key());
    }

    public function testStringKeys(): void
    {
        $collection = new TestCollection(['foo' => 1, 'bar' => '2']);
        static::assertSame('foo', $collection->key());

        $collection->next();
        static::assertSame('bar', $collection->key());

        $collection->rewind();
        static::assertTrue($collection->valid());
        static::assertSame('foo', $collection->key());
    }

    public function testOutOfBounds(): void
    {
        $collection = new TestCollection([1, '2']);
        $collection->next();
        $collection->next();

        static::assertFalse($collection->valid());

        $collection->rewind();
        static::assertTrue($collection->valid());
        static::assertSame(0, $collection->key());
    }
}
