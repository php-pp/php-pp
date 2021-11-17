<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::doCurrent */
final class DoCurrentTest extends TestCase
{
    public function testEmpty(): void
    {
        static::assertFalse((new TestCollection())->current());
    }

    public function testOneItem(): void
    {
        $collection = new TestCollection(['foo']);

        static::assertSame('foo', $collection->current());
    }

    public function testTwoItems(): void
    {
        $collection = new TestCollection(['foo', 'bar']);

        static::assertSame('foo', $collection->current());

        $collection->next();

        static::assertSame('bar', $collection->current());
    }

    public function testOutOfBounds(): void
    {
        $collection = new TestCollection(['foo']);

        static::assertSame('foo', $collection->current());

        $collection->next();

        static::assertFalse($collection->current());
    }
}
