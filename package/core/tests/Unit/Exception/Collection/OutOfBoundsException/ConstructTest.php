<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\OutOfBoundsException;

use PhpPp\Core\Component\Exception\Collection\OutOfBoundsException;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Exception\Collection\OutOfBoundsException::__construct */
final class ConstructTest extends TestCase
{
    public function testMessage(): void
    {
        static::assertSame(
            'Cannot read array: pointer is outside the limits of the array.',
            (new OutOfBoundsException())->getMessage()
        );
    }

    public function testCode(): void
    {
        static::assertSame(42, (new OutOfBoundsException(42))->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception();
        static::assertSame($previous, (new OutOfBoundsException(0, $previous))->getPrevious());
    }
}
