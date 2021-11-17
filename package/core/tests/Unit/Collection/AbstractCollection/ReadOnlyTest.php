<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\ReadOnlyException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \PhpPp\Core\Component\Collection\AbstractCollection::isReadOnly
 * @covers \PhpPp\Core\Component\Collection\AbstractCollection::setReadOnly
 */
final class ReadOnlyTest extends TestCase
{
    public function testSetTrue(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(true);

        static::assertTrue($collection->isReadOnly());
    }

    public function testNoParameters(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly();

        static::assertTrue($collection->isReadOnly());
    }

    public function testSetFalse(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(false);

        static::assertFalse($collection->isReadOnly());
    }

    public function testSetTrueAlreadyReadOnly(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(true);

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $collection->setReadOnly(true);
    }

    public function testSetFalseAlreadyReadOnly(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(true);

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $collection->setReadOnly(false);
    }
}
