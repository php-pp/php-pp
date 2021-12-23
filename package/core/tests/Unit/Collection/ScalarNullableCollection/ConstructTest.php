<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\{
    Collection\ScalarNullableCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testString(): void
    {
        $collection = new ScalarNullableCollection(['foo']);

        static::assertSame('foo', $collection->get(0));
    }

    public function testInteger(): void
    {
        $collection = new ScalarNullableCollection([1]);

        static::assertSame(1, $collection->get(0));
    }

    public function testFloat(): void
    {
        $collection = new ScalarNullableCollection([1.2]);

        static::assertSame(1.2, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new ScalarNullableCollection($values);
    }

    protected function isAllowNull(): bool
    {
        return true;
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be of type string, integer, float, null.';
    }
}
