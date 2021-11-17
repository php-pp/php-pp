<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestNullableCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::resetKeys */
final class ResetKeysTest extends TestCase
{
    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->resetKeys());
    }

    public function testResetKeys(): void
    {
        $collection = new TestNullableCollection([0 => 1, 1 => '2', 2 => null, 'foo' => 'foo']);

        static::assertSame([0, 1, 2, 'foo'], $collection->getKeys()->toArray());
        static::assertSame(1, $collection->get(0));
        static::assertSame('2', $collection->get(1));
        static::assertNull($collection->get(2));
        static::assertSame('foo', $collection->get('foo'));

        $collection->resetKeys();

        static::assertSame([0, 1, 2, 3], $collection->getKeys()->toArray());
        static::assertSame(1, $collection->get(0));
        static::assertSame('2', $collection->get(1));
        static::assertNull($collection->get(2));
        static::assertSame('foo', $collection->get(3));
    }
}
