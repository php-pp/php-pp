<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\{
    Collection\StdClassCollection,
    Exception\Collection\InvalidValueTypeException,
    Tests\Unit\Collection\AbstractConstructTest,
    Tests\Unit\Collection\TestCollection
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testStdClass(): void
    {
        $stdClass = new \stdClass();
        $collection = new StdClassCollection([$stdClass]);

        static::assertSame($stdClass, $collection->get(0));
    }

    public function testTestCollection(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection([new TestCollection()]);
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new StdClassCollection($values);
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be instance of stdClass.';
    }
}
