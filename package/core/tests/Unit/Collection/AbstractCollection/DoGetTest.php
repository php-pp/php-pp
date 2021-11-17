<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\InvalidKeyTypeException,
    Exception\Collection\KeyNotFoundException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::doGet */
final class DoGetTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();

        $this->expectException(KeyNotFoundException::class);
        $this->expectExceptionMessage('Key "0" not found.');
        $this->expectExceptionCode(0);
        $collection->callDoGet(0);
    }

    public function testStringKey(): void
    {
        $collection = new TestCollection(['foo' => 'bar']);

        static::assertSame('bar', $collection->callDoGet('foo'));
    }

    public function testIntegerKey(): void
    {
        $collection = new TestCollection([0 => 10]);

        static::assertSame(10, $collection->callDoGet(0));
    }

    public function testFloatKey(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        $collection->callDoGet(0.0);
    }

    public function testArrayKey(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        $collection->callDoGet([]);
    }

    public function testObjectKey(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        $collection->callDoGet(new \stdClass());
    }

    public function testNullKey(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        $collection->callDoGet(null);
    }
}
