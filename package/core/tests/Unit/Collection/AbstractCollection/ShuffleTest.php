<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::shuffle */
final class ShuffleTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = (new TestCollection())->shuffle();

        static::assertCount(0, $collection);
    }

    public function testOneValue(): void
    {
        $collection = (new TestCollection(['foo']))->shuffle();

        static::assertCount(1, $collection);
        static::assertSame('foo', $collection->get(0));
    }

    public function testThreeValues(): void
    {
        $collection = (new TestCollection(['foo', 'bar' => 'baz', 10 => 20]))->shuffle();

        static::assertCount(3, $collection);
        static::assertTrue($collection->hasKey(0));
        static::assertTrue($collection->hasKey(1));
        static::assertTrue($collection->hasKey(2));
        static::assertTrue($collection->callDoHas('foo'));
        static::assertTrue($collection->callDoHas('baz'));
        static::assertTrue($collection->callDoHas(20));
    }

    public function testStringKey(): void
    {
        $collection = (new TestCollection(['foo' => 'bar']))->shuffle();

        static::assertCount(1, $collection);
        static::assertSame('bar', $collection->get(0));
    }

    public function testIntegerKey(): void
    {
        $collection = (new TestCollection([10 => 'bar']))->shuffle();

        static::assertCount(1, $collection);
        static::assertSame('bar', $collection->get(0));
    }
}
