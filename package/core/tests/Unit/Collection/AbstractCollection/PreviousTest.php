<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\OutOfBoundsException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::previous */
final class PreviousTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Cannot read array: pointer is outside the limits of the array.');
        $collection->previous();
    }

    public function testOneValue(): void
    {
        $collection = new TestCollection([1]);

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Cannot read array: pointer is outside the limits of the array.');
        $collection->previous();
    }

    public function testThreeValue(): void
    {
        $collection = new TestCollection([1, 2, 3]);

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Cannot read array: pointer is outside the limits of the array.');
        $collection->previous();
    }

    public function testThreeValueStringKeys(): void
    {
        $collection = new TestCollection(['foo' => 'fooValue', 'bar' => 'barValue', 'baz' => 'bazValue']);

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Cannot read array: pointer is outside the limits of the array.');
        $collection->previous();
    }

    public function testPrevious1Time(): void
    {
        $collection = new TestCollection([1, 2, 3]);
        $collection->next();
        $collection->previous();

        static::assertTrue($collection->valid());
        static::assertSame(0, $collection->key());
        static::assertSame(1, $collection->current());
    }

    public function testPrevious2Times(): void
    {
        $collection = new TestCollection([1, 2, 3]);
        $collection->next();
        $collection->next();
        $collection->previous();

        static::assertTrue($collection->valid());
        static::assertSame(1, $collection->key());
        static::assertSame(2, $collection->current());
    }

    public function testPreviousOutOfBounds(): void
    {
        $collection = new TestCollection([1, 2, 3]);
        $collection->next();
        $collection->previous();

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Cannot read array: pointer is outside the limits of the array.');
        $collection->previous();
    }
}
