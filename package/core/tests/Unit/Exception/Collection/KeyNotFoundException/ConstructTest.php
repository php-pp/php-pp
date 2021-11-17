<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\KeyNotFoundException;

use PhpPp\Core\Component\{
    Exception\Collection\KeyNotFoundException,
    Tests\Unit\Collection\TestToString
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Exception\Collection\KeyNotFoundException::__construct */
final class ConstructTest extends TestCase
{
    public function testStringKey(): void
    {
        static::assertSame('Key "foo" not found.', (new KeyNotFoundException('foo'))->getMessage());
    }

    public function testIntegerKey(): void
    {
        static::assertSame('Key "1" not found.', (new KeyNotFoundException(1))->getMessage());
    }

    public function testFloatMinKey(): void
    {
        static::assertSame('Key "1.1" not found.', (new KeyNotFoundException(1.1))->getMessage());
    }

    public function testFloatMaxKey(): void
    {
        static::assertSame('Key "1.9" not found.', (new KeyNotFoundException(1.9))->getMessage());
    }

    public function testTrueKey(): void
    {
        static::assertSame('Key "1" not found.', (new KeyNotFoundException(true))->getMessage());
    }

    public function testFalseKey(): void
    {
        static::assertSame('Key "" not found.', (new KeyNotFoundException(false))->getMessage());
    }

    public function testNullKey(): void
    {
        static::assertSame('Key "" not found.', (new KeyNotFoundException(null))->getMessage());
    }

    public function testStdClassKey(): void
    {
        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Object of class stdClass could not be converted to string');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line constructor expects bool|float|int|string|null, stdClass given. */
        new KeyNotFoundException(new \stdClass());
    }

    public function testToStringKey(): void
    {
        /** @phpstan-ignore-next-line constructor expects bool|float|int|string|null, TestToString given */
        static::assertSame('Key "foo" not found.', (new KeyNotFoundException(new TestToString()))->getMessage());
    }

    public function testCode(): void
    {
        static::assertSame(42, (new KeyNotFoundException('foo', 42))->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception();
        static::assertSame($previous, (new KeyNotFoundException('foo', 0, $previous))->getPrevious());
    }
}
