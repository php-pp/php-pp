<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\InvalidCountException;

use PhpPp\Core\Component\Exception\Collection\InvalidCountException;
use PHPUnit\Framework\TestCase;

/** @coversNothing */
final class ConstructTest extends TestCase
{
    public function testMessage(): void
    {
        static::assertSame(
            'foo',
            (new InvalidCountException('foo'))->getMessage()
        );
    }

    public function testCode(): void
    {
        static::assertSame(42, (new InvalidCountException('foo', 42))->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception();
        static::assertSame($previous, (new InvalidCountException('foo', 0, $previous))->getPrevious());
    }
}
