<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Exception\Collection\InvalidValueTypeException;

use PhpPp\Core\Component\{
    Collection\StringCollection,
    Exception\Collection\InvalidValueTypeException
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Exception\Collection\InvalidValueTypeException::createFromAllowedTypes */
final class CreateFromAllowedTypesTest extends TestCase
{
    public function testEmptyTypes(): void
    {
        $exception = InvalidValueTypeException::createFromAllowedTypes(new StringCollection());

        static::assertSame('Value should be of type .', $exception->getMessage());
    }

    public function testTypes(): void
    {
        $exception = InvalidValueTypeException::createFromAllowedTypes(new StringCollection(['string', 'integer']));

        static::assertSame('Value should be of type string, integer.', $exception->getMessage());
    }

    public function testCode(): void
    {
        $exception = InvalidValueTypeException::createFromAllowedTypes(new StringCollection(), 42);

        static::assertSame(42, $exception->getCode());
    }

    public function testPrevious(): void
    {
        $previous = new \Exception('foo');
        $exception = InvalidValueTypeException::createFromAllowedTypes(new StringCollection(), 0, $previous);

        static::assertSame($previous, $exception->getPrevious());
    }
}
