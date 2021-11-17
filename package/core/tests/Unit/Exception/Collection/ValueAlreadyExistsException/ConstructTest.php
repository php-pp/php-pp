<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\ValueAlreadyExistsException;

use PhpPp\Core\Component\Exception\Collection\ValueAlreadyExistsException;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Exception\Collection\ValueAlreadyExistsException::__construct */
final class ConstructTest extends TestCase
{
    public function testValue(): void
    {
        static::assertSame('Value "foo" already exists.', (new ValueAlreadyExistsException('foo'))->getMessage());
    }

    public function testCode(): void
    {
        static::assertSame(42, (new ValueAlreadyExistsException('foo', 42))->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception();
        static::assertSame($previous, (new ValueAlreadyExistsException('foo', 0, $previous))->getPrevious());
    }
}
