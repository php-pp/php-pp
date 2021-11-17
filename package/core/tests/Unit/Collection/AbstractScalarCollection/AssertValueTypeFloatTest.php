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
final class AssertValueTypeFloatTest extends TestCase
{
    public function testFloat(): void
    {
        (new TestNullableScalarCollection())
            ->callAssertValueType(42.9);

        $this->addToAssertionCount(1);
    }

    public function testNullableFloat(): void
    {
        (new TestNullableScalarCollection())
            ->callAssertValueType(42.9);

        $this->addToAssertionCount(1);
    }

    public function testFloatDiallowed(): void
    {
        $collection = (new TestScalarCollection())
            ->setAllowFloat(false);

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Type float is not allowed by configuration.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42.9);
    }

    public function testNullableFloatDiallowed(): void
    {
        $collection = (new TestNullableScalarCollection())
            ->setAllowFloat(false);

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Type float is not allowed by configuration.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType(42.9);
    }
}
