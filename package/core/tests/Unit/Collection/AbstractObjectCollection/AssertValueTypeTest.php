<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractObjectCollection;

use PhpPp\Core\Component\{
    Exception\Collection\InvalidValueTypeException,
    Tests\Unit\Collection\TestObjectCollection,
    Tests\Unit\Collection\TestStdClassCollection,
    Tests\Unit\Collection\TestStdClassNullableCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractObjectCollection::assertValueType */
final class AssertValueTypeTest extends TestCase
{
    public function testString(): void
    {
        $collection = new TestStdClassCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType('foo');
    }

    public function testNullableString(): void
    {
        $collection = new TestStdClassNullableCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass or null.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType('foo');
    }

    public function testInteger(): void
    {
        $collection = new TestStdClassCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42);
    }

    public function testNullableInteger(): void
    {
        $collection = new TestStdClassNullableCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass or null.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42);
    }

    public function testFloat(): void
    {
        $collection = new TestStdClassCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42.9);
    }

    public function testNullableFloat(): void
    {
        $collection = new TestStdClassNullableCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass or null.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42.9);
    }

    public function testBoolean(): void
    {
        $collection = new TestStdClassCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(true);
    }

    public function testNullableBoolean(): void
    {
        $collection = new TestStdClassNullableCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass or null.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(true);
    }

    public function testArray(): void
    {
        $collection = new TestStdClassCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(['foo']);
    }

    public function testNullableArray(): void
    {
        $collection = new TestStdClassNullableCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass or null.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(['foo']);
    }

    public function testStdClass(): void
    {
        (new TestStdClassCollection())->callAssertValueType(new \stdClass());

        $this->addToAssertionCount(1);
    }

    public function testNullableStdClass(): void
    {
        (new TestStdClassNullableCollection())->callAssertValueType(new \stdClass());

        $this->addToAssertionCount(1);
    }

    public function testObject(): void
    {
        (new TestObjectCollection())->callAssertValueType(new \stdClass());

        $this->addToAssertionCount(1);
    }

    public function testNullableObject(): void
    {
        (new TestStdClassNullableCollection())->callAssertValueType(new \stdClass());

        $this->addToAssertionCount(1);
    }

    public function testNull(): void
    {
        $collection = new TestStdClassCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be instance of stdClass.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(null);
    }

    public function testNullableNull(): void
    {
        (new TestStdClassNullableCollection())->callAssertValueType(null);

        $this->addToAssertionCount(1);
    }
}
