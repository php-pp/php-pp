<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::getKeys */
final class GetKeysTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->getKeys());
    }

    public function testStringKeys(): void
    {
        $collection = new TestCollection(['foo' => 'bar', 'baz' => 'qux']);

        $keys = $collection->getKeys();
        static::assertCount(2, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1]));
        static::assertSame('foo', $keys->get(0));
        static::assertSame('baz', $keys->get(1));
    }

    public function testIntegerKeys(): void
    {
        $collection = new TestCollection([0 => 'bar', 1 => 'qux']);

        $keys = $collection->getKeys();
        static::assertCount(2, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1]));
        static::assertSame(0, $keys->get(0));
        static::assertSame(1, $keys->get(1));
    }

    public function testStringOrIntegerKeys(): void
    {
        $collection = new TestCollection(['foo' => 'bar', 0 => 'bar', 'baz' => 'qux', 1 => 'qux']);

        $keys = $collection->getKeys();
        static::assertCount(4, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1, 2, 3]));
        static::assertSame('foo', $keys->get(0));
        static::assertSame(0, $keys->get(1));
        static::assertSame('baz', $keys->get(2));
        static::assertSame(1, $keys->get(3));
    }
}
