<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::getStringKeys */
final class GetStringKeysTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->getStringKeys());
    }

    public function testStringKeys(): void
    {
        $keys = (new TestCollection(['foo' => 'bar', 'baz' => 'qux']))
            ->getStringKeys();

        static::assertCount(2, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1]));
        static::assertSame('foo', $keys->get(0));
        static::assertSame('baz', $keys->get(1));
    }

    public function testIntegerKeys(): void
    {
        $keys = (new TestCollection([0 => 'bar', 1 => 'qux']))
            ->getStringKeys();

        static::assertCount(0, $keys);
    }

    public function testStringOrIntegerKeys(): void
    {
        $keys = (new TestCollection(['foo' => 'bar', 0 => 'bar', 'baz' => 'qux', 1 => 'qux']))
            ->getStringKeys();

        static::assertCount(2, $keys);
        static::assertKeysOrder($keys, new ScalarCollection([0, 1]));
        static::assertSame('foo', $keys->get(0));
        static::assertSame('baz', $keys->get(1));
    }
}
