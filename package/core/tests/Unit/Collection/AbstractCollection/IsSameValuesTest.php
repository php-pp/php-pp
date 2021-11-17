<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestToString
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::isSameValues */
final class IsSameValuesTest extends TestCase
{
    public function testString(): void
    {
        $collection = new TestCollection();

        static::assertTrue($collection->callIsSameValues('foo', 'foo'));
    }

    public function testDifferentsStrings(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues('foo', 'bar'));
    }

    public function testInteger(): void
    {
        $collection = new TestCollection();

        static::assertTrue($collection->callIsSameValues(42, 42));
    }

    public function testDifferentsIntegers(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues(42, 43));
    }

    public function testFloat(): void
    {
        $collection = new TestCollection();

        static::assertTrue($collection->callIsSameValues(42.0, 42.0));
    }

    public function testDifferentsFloat(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues(42.0, 42.1));
    }

    public function testTrue(): void
    {
        $collection = new TestCollection();

        static::assertTrue($collection->callIsSameValues(true, true));
    }

    public function testFalse(): void
    {
        $collection = new TestCollection();

        static::assertTrue($collection->callIsSameValues(false, false));
    }

    public function testTrueFalse(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues(true, false));
    }

    public function testStdClass(): void
    {
        $collection = new TestCollection();
        $stdClass = new \stdClass();

        static::assertTrue($collection->callIsSameValues($stdClass, $stdClass));
    }

    public function testDifferentsStdClass(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues(new \stdClass(), new \stdClass()));
    }

    public function testToString(): void
    {
        $collection = new TestCollection();
        $toString = new TestToString();

        static::assertTrue($collection->callIsSameValues($toString, $toString));
    }

    public function testToStringDifferentsInstances(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues(new TestToString('foo'), new TestToString('bar')));
    }

    public function testDifferentsToString(): void
    {
        $collection = new TestCollection();

        static::assertFalse($collection->callIsSameValues(new TestToString(), new TestToString()));
    }
}
