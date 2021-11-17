<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::getIntegerKeys */
final class GetIntegerKeysTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->getIntegerKeys());
    }

    public function testStringKeys(): void
    {
        $keys = (new TestCollection(['foo' => 'bar', 'baz' => 'qux']))
            ->getIntegerKeys();

        static::assertCount(0, $keys);
    }

    public function testIntegerKeys(): void
    {
        $keys = (new TestCollection([0 => 'bar', 1 => 'qux']))
            ->getIntegerKeys();

        static::assertCount(2, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1]));
        static::assertSame(0, $keys->get(0));
        static::assertSame(1, $keys->get(1));
    }

    public function testStringOrIntegerKeys(): void
    {
        $keys = (new TestCollection(['foo' => 'bar', 0 => 'bar', 'baz' => 'qux', 1 => 'qux']))
            ->getIntegerKeys();

        static::assertCount(2, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1]));
        static::assertSame(0, $keys->get(0));
        static::assertSame(1, $keys->get(1));
    }
}
