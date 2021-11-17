<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::hasKey */
final class HasKeyTest extends TestCase
{
    public function testEmpty(): void
    {
        static::assertFalse((new TestCollection())->hasKey(0));
        static::assertFalse((new TestCollection())->hasKey('foo'));
    }

    public function testHasKey0(): void
    {
        static::assertTrue((new TestCollection([0 => 'foo']))->hasKey(0));
    }

    public function testHasKeyFoo(): void
    {
        static::assertTrue((new TestCollection(['foo' => 'bar']))->hasKey('foo'));
    }

    public function testDoNotHaveKey0(): void
    {
        static::assertFalse((new TestCollection([1 => 'foo', 'bar' => 'baz']))->hasKey(0));
    }

    public function testDoNotHaveKeyFoo(): void
    {
        static::assertFalse((new TestCollection([0 => 'foo', 'bar' => 'baz']))->hasKey('foo'));
    }
}
