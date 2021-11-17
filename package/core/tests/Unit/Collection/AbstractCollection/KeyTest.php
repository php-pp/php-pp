<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::key */
final class KeyTest extends TestCase
{
    public function testEmpty(): void
    {
        static::assertNull((new TestCollection())->key());
    }

    public function testOneIntKey(): void
    {
        $collection = new TestCollection(['foo']);

        static::assertSame(0, $collection->key());
    }

    public function testOneStringKey(): void
    {
        $collection = new TestCollection(['foo' => 'bar']);

        static::assertSame('foo', $collection->key());
    }

    public function testTwoItems(): void
    {
        $collection = new TestCollection(['foo', 'bar' => 'baz']);

        static::assertSame(0, $collection->key());

        $collection->next();

        static::assertSame('bar', $collection->key());
    }

    public function testOutOfBounds(): void
    {
        $collection = new TestCollection(['foo']);

        static::assertSame(0, $collection->key());

        $collection->next();

        static::assertNull($collection->key());
    }
}
