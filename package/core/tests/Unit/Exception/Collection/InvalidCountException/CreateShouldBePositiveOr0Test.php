<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\InvalidCountException;

use PhpPp\Core\Component\Exception\Collection\InvalidCountException;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Exception\Collection\InvalidCountException::createShouldBePositiveOr0 */
final class CreateShouldBePositiveOr0Test extends TestCase
{
    public function testMessage(): void
    {
        static::assertSame(
            'Value "-1" for "count" should be superior or equal to "0".',
            InvalidCountException::createShouldBePositiveOr0(-1)->getMessage()
        );
    }

    public function testCode(): void
    {
        static::assertSame(42, InvalidCountException::createShouldBePositiveOr0(-1, 42)->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception();
        static::assertSame(
            $previous,
            InvalidCountException::createShouldBePositiveOr0(-1, 0, $previous)->getPrevious()
        );
    }
}
