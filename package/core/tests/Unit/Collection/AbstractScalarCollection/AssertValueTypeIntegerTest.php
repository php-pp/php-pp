<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractScalarCollection;

use PhpPp\Core\Component\{
    Exception\Collection\InvalidValueTypeException,
    Tests\Unit\Collection\TestNullableScalarCollection,
    Tests\Unit\Collection\TestScalarCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractScalarCollection::assertValueType */
final class AssertValueTypeIntegerTest extends TestCase
{
    public function testInteger(): void
    {
        (new TestNullableScalarCollection())
            ->callAssertValueType(42);

        $this->addToAssertionCount(1);
    }

    public function testNullableString(): void
    {
        (new TestNullableScalarCollection())
            ->callAssertValueType(42);

        $this->addToAssertionCount(1);
    }

    public function testIntegerDiallowed(): void
    {
        $collection = (new TestScalarCollection())
            ->setAllowInteger(false);

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Type integer is not allowed by configuration.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42);
    }

    public function testNullableStringDiallowed(): void
    {
        $collection = (new TestNullableScalarCollection())
            ->setAllowInteger(false);

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Type integer is not allowed by configuration.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42);
    }
}
