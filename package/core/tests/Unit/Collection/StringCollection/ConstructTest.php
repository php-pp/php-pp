<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringCollection;

use PhpPp\Core\Component\{
    Collection\StringCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\StringCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testString(): void
    {
        $collection = new StringCollection(['foo']);

        static::assertSame('foo', $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new StringCollection($values);
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be of type string.';
    }
}
