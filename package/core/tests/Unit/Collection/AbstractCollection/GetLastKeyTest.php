<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\EmptyCollectionException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::getLastKey */
final class GetLastKeyTest extends TestCase
{
    public function testEmpty(): void
    {
        $this->expectException(EmptyCollectionException::class);
        $this->expectExceptionMessage('Collection is empty.');
        $this->expectExceptionCode(0);
        (new TestCollection())->getLastKey();
    }

    public function testOneIntegerKey(): void
    {
        static::assertSame(0, (new TestCollection(['foo']))->getLastKey());
    }

    public function testTreeIntegerKeys(): void
    {
        static::assertSame(2, (new TestCollection(['foo', 'bar', 'baz']))->getLastKey());
    }

    public function testOneIntegerNon0Key(): void
    {
        static::assertSame(3, (new TestCollection([3 => 'foo']))->getLastKey());
    }

    public function testTreeIntegerNon0Keys(): void
    {
        static::assertSame(1, (new TestCollection([3 => 'foo', 2 => 'bar', 1 => 'baz']))->getLastKey());
    }

    public function testOneStringKey(): void
    {
        static::assertSame('foo', (new TestCollection(['foo' => 1]))->getLastKey());
    }

    public function testTreeStringKeys(): void
    {
        static::assertSame('baz', (new TestCollection(['foo' => 1, 'bar' => 2, 'baz' => 3]))->getLastKey());
    }
}
