<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Exception\Collection\KeyNotFoundException,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::remove */
final class RemoveTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        $collection = new TestCollection();

        $this->expectException(KeyNotFoundException::class);
        $this->expectExceptionMessage('Key "0" not found.');
        $this->expectExceptionCode(0);
        $collection->remove(0);
    }

    public function testIntegerKeyExists(): void
    {
        $collection = new TestCollection([0 => 'foo']);

        static::assertCount(1, $collection);
        static::assertTrue($collection->hasKey(0));

        $collection->remove(0);

        static::assertCount(0, $collection);
    }

    public function testStringKeyExists(): void
    {
        $collection = new TestCollection(['foo' => 'bar']);

        static::assertCount(1, $collection);
        static::assertTrue($collection->hasKey('foo'));

        $collection->remove('foo');

        static::assertCount(0, $collection);
    }

    public function testKeyNotFound(): void
    {
        $collection = new TestCollection([0 => 'foo']);

        static::assertCount(1, $collection);
        static::assertTrue($collection->hasKey(0));

        $this->expectException(KeyNotFoundException::class);
        $this->expectExceptionMessage('Key "foo" not found.');
        $this->expectExceptionCode(0);
        $collection->remove('foo');
    }

    public function testRemoveKey0(): void
    {
        $collection = new TestCollection([0, 1, 2]);

        static::assertSame(0, $collection->key());

        $collection->remove(0);
        static::assertCount(2, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([1, 2]));
        static::assertSame(1, $collection->key());
        static::assertSame(1, $collection->current());
    }

    public function testRemoveKey1(): void
    {
        $collection = new TestCollection([0, 1, 2]);

        static::assertSame(0, $collection->key());

        $collection->remove(1);
        static::assertCount(2, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 2]));
        static::assertSame(0, $collection->key());
        static::assertSame(0, $collection->current());
    }
}
