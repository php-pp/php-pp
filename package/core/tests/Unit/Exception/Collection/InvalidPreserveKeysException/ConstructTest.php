<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\InvalidPreserveKeysException;

use PhpPp\Core\Component\Exception\Collection\InvalidPreserveKeysException;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Exception\Collection\InvalidPreserveKeysException::__construct */
final class ConstructTest extends TestCase
{
    public function testMessage(): void
    {
        static::assertSame(
            'Invalid preserve keys type "42".',
            (new InvalidPreserveKeysException(42))->getMessage()
        );
    }

    public function testCode(): void
    {
        static::assertSame(43, (new InvalidPreserveKeysException(42, 43))->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception();
        static::assertSame($previous, (new InvalidPreserveKeysException(42, 0, $previous))->getPrevious());
    }
}
