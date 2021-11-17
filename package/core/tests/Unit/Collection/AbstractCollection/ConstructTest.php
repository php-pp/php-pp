<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Contract\Collection\CollectionInterface;
use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::__construct */
final class ConstructTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testDefault(): void
    {
        $collection = new TestCollection();

        static::assertCount(0, $collection);
        static::assertFalse($collection->valid());
        static::assertFalse($collection->isReadOnly());
        static::assertSame(CollectionInterface::VALUE_ALREADY_EXISTS_ADD, $collection->getValueAlreadyExistsMode());
    }

    public function testValues(): void
    {
        $collection = new TestCollection([1, 2, 3]);

        static::assertCount(3, $collection);
        static::assertKeysOrder($collection, new ScalarCollection([0, 1, 2]));
        static::assertSame(1, $collection->get(0));
        static::assertSame(2, $collection->get(1));
        static::assertSame(3, $collection->get(2));
    }
}
