<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\InvalidKeyTypeException,
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestToString
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::assertKeyType */
final class AssertKeyTypeTest extends TestCase
{
    public function testString(): void
    {
        (new TestCollection())->callAssertKeyType('foo');

        $this->addToAssertionCount(1);
    }

    public function testInteger(): void
    {
        (new TestCollection())->callAssertKeyType(42);

        $this->addToAssertionCount(1);
    }

    public function testFloat(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line Parameter $key of method callAssertKeyType() expects int|string, float given. */
        $collection->callAssertKeyType(42.9);
    }

    public function testTrue(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line Parameter $key of method callAssertKeyType() expects int|string, true given. */
        $collection->callAssertKeyType(true);
    }

    public function testFalse(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line Parameter $key of method callAssertKeyType() expects int|string, false given. */
        $collection->callAssertKeyType(false);
    }

    public function testArray(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line Parameter $key of method callAssertKeyType() expects int|string, array given. */
        $collection->callAssertKeyType([]);
    }

    public function testStdClass(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line Parameter $key of method callAssertKeyType() expects int|string, stdClass given. */
        $collection->callAssertKeyType(new \stdClass());
    }

    public function testToString(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /**
         * Parameter $key of method callAssertKeyType() expects int|string, TestToString given.
         * @phpstan-ignore-next-line
         */
        $collection->callAssertKeyType(new TestToString());
    }

    public function testResource(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /**
         * Parameter $key of method callAssertKeyType() expects int|string, resource|false given.
         * @phpstan-ignore-next-line
         */
        $collection->callAssertKeyType(fopen(__FILE__, 'r'));
    }

    public function testNull(): void
    {
        $collection = new TestCollection();

        $this->expectException(InvalidKeyTypeException::class);
        $this->expectExceptionMessage('Key should be of type string, integer.');
        $this->expectExceptionCode(0);
        /** @phpstan-ignore-next-line Parameter $key of method callAssertKeyType() expects int|string, null given. */
        $collection->callAssertKeyType(null);
    }
}
