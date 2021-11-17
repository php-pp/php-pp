<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\ReadOnlyException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \PhpPp\Core\Component\Collection\AbstractCollection::getValueAlreadyExistsMode
 * @covers \PhpPp\Core\Component\Collection\AbstractCollection::setValueAlreadyExistsMode
 */
final class ValueAlreadyExistsModeTest extends TestCase
{
    public function testModeAdd(): void
    {
        $collection = (new TestCollection())
            ->setValueAlreadyExistsMode(TestCollection::VALUE_ALREADY_EXISTS_ADD);

        static::assertSame(TestCollection::VALUE_ALREADY_EXISTS_ADD, $collection->getValueAlreadyExistsMode());
    }

    public function testModeDoNotAdd(): void
    {
        $collection = (new TestCollection())
            ->setValueAlreadyExistsMode(TestCollection::VALUE_ALREADY_EXISTS_DO_NOT_ADD);

        static::assertSame(TestCollection::VALUE_ALREADY_EXISTS_DO_NOT_ADD, $collection->getValueAlreadyExistsMode());
    }

    public function testModeException(): void
    {
        $collection = (new TestCollection())
            ->setValueAlreadyExistsMode(TestCollection::VALUE_ALREADY_EXISTS_EXCEPTION);

        static::assertSame(TestCollection::VALUE_ALREADY_EXISTS_EXCEPTION, $collection->getValueAlreadyExistsMode());
    }

    public function testUnknownMode(): void
    {
        $collection = (new TestCollection())
            ->setValueAlreadyExistsMode(42);

        static::assertSame(42, $collection->getValueAlreadyExistsMode());
    }

    public function testReadOnlyModeAdd(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly();

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $this->expectExceptionCode(0);
        $collection->setValueAlreadyExistsMode(TestCollection::VALUE_ALREADY_EXISTS_ADD);
    }

    public function testReadOnlyModeDoNotAdd(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly();

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $this->expectExceptionCode(0);
        $collection->setValueAlreadyExistsMode(TestCollection::VALUE_ALREADY_EXISTS_DO_NOT_ADD);
    }

    public function testReadOnlyModeException(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly();

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $this->expectExceptionCode(0);
        $collection->setValueAlreadyExistsMode(TestCollection::VALUE_ALREADY_EXISTS_EXCEPTION);
    }
}
