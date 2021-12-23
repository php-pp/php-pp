<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\{
    Collection\FloatNullableCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testFloat(): void
    {
        $collection = new FloatNullableCollection([1.2]);

        static::assertSame(1.2, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new FloatNullableCollection($values);
    }

    protected function isAllowNull(): bool
    {
        return true;
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be of type float, null.';
    }
}
