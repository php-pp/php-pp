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
final class AssertValueTypeArrayTest extends TestCase
{
    public function testArray(): void
    {
        $collection = new TestScalarCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be of type string, integer, float.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType([]);
    }

    public function testNullableArray(): void
    {
        $collection = new TestNullableScalarCollection();

        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be of type string, integer, float, null.');
        $this->expectExceptionCode(0);
        $collection->callAssertValueType([]);
    }
}
