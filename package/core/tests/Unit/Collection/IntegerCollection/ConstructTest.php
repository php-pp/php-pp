<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\{
    Collection\IntegerCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testInteger(): void
    {
        $collection = new IntegerCollection([1]);

        static::assertSame(1, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new IntegerCollection($values);
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be of type integer.';
    }
}
