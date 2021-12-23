<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testString(): void
    {
        $collection = new ScalarCollection(['foo']);

        static::assertSame('foo', $collection->get(0));
    }

    public function testInteger(): void
    {
        $collection = new ScalarCollection([1]);

        static::assertSame(1, $collection->get(0));
    }

    public function testFloat(): void
    {
        $collection = new ScalarCollection([1.2]);

        static::assertSame(1.2, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new ScalarCollection($values);
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be of type string, integer, float.';
    }
}
