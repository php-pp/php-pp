<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::doHas */
final class DoHasTest extends TestCase
{
    public function testEmpty(): void
    {
        static::assertFalse((new TestCollection())->callDoHas('foo'));
    }

    public function testHasValue0(): void
    {
        static::assertTrue((new TestCollection([0]))->callDoHas(0));
    }

    public function testHasValueFoo(): void
    {
        static::assertTrue((new TestCollection(['foo']))->callDoHas('foo'));
    }

    public function testDoNotHaveValue0(): void
    {
        static::assertFalse((new TestCollection([1]))->callDoHas(0));
    }

    public function testDoNotHaveStringValue0(): void
    {
        static::assertFalse((new TestCollection([0]))->callDoHas('0'));
    }

    public function testDoNotHaveIntegerValue0(): void
    {
        static::assertFalse((new TestCollection(['0']))->callDoHas(0));
    }

    public function testDoNotHaveValueFoo(): void
    {
        static::assertFalse((new TestCollection(['foo', 'bar']))->callDoHas('baz'));
    }
}
