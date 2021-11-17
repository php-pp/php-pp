<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::next */
final class NextTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();
        $collection->next();

        static::assertNull($collection->key());
    }

    public function testTwoValues(): void
    {
        $collection = new TestCollection([1, 2]);

        static::assertSame(0, $collection->key());
        static::assertSame(1, $collection->current());

        $collection->next();
        static::assertSame(1, $collection->key());
        static::assertSame(2, $collection->current());

        $collection->next();
        static::assertNull($collection->key());
    }

    public function testOutOfBounds(): void
    {
        $collection = new TestCollection([1]);

        static::assertSame(0, $collection->key());
        static::assertSame(1, $collection->current());

        $collection->next();
        static::assertNull($collection->key());

        $collection->next();
        static::assertNull($collection->key());
    }
}
