<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Iterable\IterableUtils;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Iterable\IterableUtils,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestIterator,
    Tests\Unit\Collection\TestToArray
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Iterable\IterableUtils::toArray */
final class ToArrayTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testArray(): void
    {
        $stdClass = new \stdClass();
        $array = IterableUtils::toArray(
            [
                1,
                1.2,
                'foo',
                true,
                false,
                ['bar'],
                $stdClass
            ]
        );

        static::assertCount(7, $array);
        static::assertKeysOrder($array, new ScalarCollection([0, 1, 2, 3, 4, 5, 6]));
        static::assertSame(1, $array[0]);
        static::assertSame(1.2, $array[1]);
        static::assertSame('foo', $array[2]);
        static::assertTrue($array[3]);
        static::assertFalse($array[4]);
        static::assertSame(['bar'], $array[5]);
        static::assertSame($stdClass, $array[6]);
    }

    public function testToArrayInterface(): void
    {
        $array = IterableUtils::toArray(new TestToArray());

        static::assertCount(7, $array);
        static::assertKeysOrder($array, new ScalarCollection([0, 1, 2, 3, 4, 5, 6]));
        static::assertSame(1, $array[0]);
        static::assertSame(1.2, $array[1]);
        static::assertSame('foo', $array[2]);
        static::assertTrue($array[3]);
        static::assertFalse($array[4]);
        static::assertSame(['bar'], $array[5]);
        static::assertInstanceOf(\stdClass::class, $array[6]);
    }

    public function testIteratorInterface(): void
    {
        $array = IterableUtils::toArray(new TestIterator());

        static::assertCount(6, $array);
        static::assertKeysOrder($array, new ScalarCollection([0, 1, 2, 3, 4, 5]));
        static::assertSame(1, $array[0]);
        static::assertSame(1.2, $array[1]);
        static::assertSame('foo', $array[2]);
        static::assertTrue($array[3]);
        static::assertSame(['bar'], $array[4]);
        static::assertInstanceOf(\stdClass::class, $array[5]);
    }
}
