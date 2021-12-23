<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\{
    Collection\ObjectCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testStdClass(): void
    {
        $stdClass = new \stdClass();
        $collection = new ObjectCollection([$stdClass]);

        static::assertSame($stdClass, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new ObjectCollection($values);
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be of type object.';
    }
}
