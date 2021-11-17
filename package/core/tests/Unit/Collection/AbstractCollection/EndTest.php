<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::end */
final class EndTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();
        $collection->end();

        static::assertFalse($collection->valid());
    }

    public function testOneValue(): void
    {
        $collection = new TestCollection([1]);
        $collection->end();

        static::assertTrue($collection->valid());
        static::assertSame(0, $collection->key());
        static::assertSame(1, $collection->current());
    }

    public function testThreeValue(): void
    {
        $collection = new TestCollection([1, 2, 3]);
        $collection->end();

        static::assertTrue($collection->valid());
        static::assertSame(2, $collection->key());
        static::assertSame(3, $collection->current());
    }

    public function testThreeValueStringKeys(): void
    {
        $collection = new TestCollection(['foo' => 'fooValue', 'bar' => 'barValue', 'baz' => 'bazValue']);
        $collection->end();

        static::assertTrue($collection->valid());
        static::assertSame('baz', $collection->key());
        static::assertSame('bazValue', $collection->current());
    }
}
