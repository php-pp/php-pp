<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Exception\Collection\InvalidCountException,
    Exception\Collection\ReadOnlyException,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestNullableCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::doFill */
final class DoFillTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        $collection = new TestCollection();

        static::assertCount(0, $collection->callDoFill('foo', 0));
    }

    public function testReadOnly(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(true);

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $collection->callDoFill('foo', 1);
    }

    public function testString(): void
    {
        $collection = (new TestCollection())
            ->callDoFill('foo', 3);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame('foo', $collection->get(0));
        static::assertSame('foo', $collection->get(1));
        static::assertSame('foo', $collection->get(2));
    }

    public function testInteger(): void
    {
        $collection = (new TestCollection())
            ->callDoFill(42, 3);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame(42, $collection->get(0));
        static::assertSame(42, $collection->get(1));
        static::assertSame(42, $collection->get(2));
    }

    public function testFloat(): void
    {
        $collection = (new TestCollection())
            ->callDoFill(42.9, 3);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame(42.9, $collection->get(0));
        static::assertSame(42.9, $collection->get(1));
        static::assertSame(42.9, $collection->get(2));
    }

    public function testBoolean(): void
    {
        $collection = (new TestCollection())
            ->callDoFill(true, 3);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertTrue($collection->get(0));
        static::assertTrue($collection->get(1));
        static::assertTrue($collection->get(2));
    }

    public function testNull(): void
    {
        $collection = (new TestNullableCollection())
            ->callDoFill(null, 3);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertNull($collection->get(0));
        static::assertNull($collection->get(1));
        static::assertNull($collection->get(2));
    }

    public function testStdClass(): void
    {
        $stdClass = new \stdClass();
        $collection = (new TestCollection())
            ->callDoFill($stdClass, 3);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame($stdClass, $collection->get(0));
        static::assertSame($stdClass, $collection->get(1));
        static::assertSame($stdClass, $collection->get(2));
    }

    public function testNegativeCount(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidCountException::class);
        $this->expectExceptionMessage('Value "-1" for "count" should be superior or equal to "0".');
        $this->expectExceptionCode(0);
        $collection->callDoFill('foo', -1);
    }

    public function testCount1(): void
    {
        $collection = new TestCollection();

        static::assertCount(1, $collection->callDoFill('foo', 1));
        static::assertSame('foo', $collection->get(0));
    }

    public function testCount3(): void
    {
        $collection = new TestCollection();

        static::assertCount(3, $collection->callDoFill('foo', 3));
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame('foo', $collection->get(0));
        static::assertSame('foo', $collection->get(1));
        static::assertSame('foo', $collection->get(2));
    }

    public function testStart10(): void
    {
        $collection = new TestCollection();

        static::assertCount(3, $collection->callDoFill('foo', 3, 10));
        static::assertKeysOrder($collection, new ScalarCollection([10, 11, 12]));
        static::assertSame('foo', $collection->get(10));
        static::assertSame('foo', $collection->get(11));
        static::assertSame('foo', $collection->get(12));
    }

    public function testStartIndexNegative10(): void
    {
        $collection = new TestCollection();

        static::assertCount(3, $collection->callDoFill('foo', 3, -10));

        if (version_compare(PHP_VERSION, '8.0.0', '<=')) {
            static::assertKeysOrder($collection, new ScalarCollection([-10, 0, 1]));
            static::assertSame('foo', $collection->get(-10));
            static::assertSame('foo', $collection->get(0));
            static::assertSame('foo', $collection->get(1));
        } else {
            static::assertKeysOrder($collection, new ScalarCollection([-10, -9, -8]));
            static::assertSame('foo', $collection->get(-10));
            static::assertSame('foo', $collection->get(-9));
            static::assertSame('foo', $collection->get(-8));
        }
    }
}
