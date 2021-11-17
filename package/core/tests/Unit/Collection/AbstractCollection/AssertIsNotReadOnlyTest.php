<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Exception\Collection\ReadOnlyException,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::assertIsNotReadOnly */
final class AssertIsNotReadOnlyTest extends TestCase
{
    public function testIsReadOnly(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly();

        $this->expectException(ReadOnlyException::class);
        $this->expectExceptionMessage('This collection is read only, you cannot edit it\'s values.');
        $this->expectExceptionCode(0);
        $collection->callAssertIsNotReadOnly();
    }

    public function testIsNotReadOnly(): void
    {
        $collection = (new TestCollection())
            ->setReadOnly(false);

        $collection->callAssertIsNotReadOnly();
        $this->addToAssertionCount(1);
    }
}
