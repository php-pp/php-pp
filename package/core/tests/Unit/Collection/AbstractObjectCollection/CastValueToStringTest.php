<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractObjectCollection;

use PhpPp\Core\Component\{
    Exception\Collection\InvalidValueTypeException,
    Tests\Unit\Collection\TestStdClassCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractObjectCollection::castValueToString */
final class CastValueToStringTest extends TestCase
{
    public function testArray(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionMessage('Value should be of type object.');
        $this->expectExceptionCode(0);
        (new TestStdClassCollection())->callCastValueToString([]);
    }

    public function testObject(): void
    {
        $stdClass = new \stdClass();
        $collection = new TestStdClassCollection();

        static::assertSame(spl_object_hash($stdClass), $collection->callCastValueToString($stdClass));
    }
}
