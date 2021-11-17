<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::refreshValid */
final class RefreshValidTest extends TestCase
{
    public function testEmpty(): void
    {
        $collection = new TestCollection();
        static::assertFalse($collection->valid());

        $collection->callRefreshValid();
        static::assertFalse($collection->valid());
    }

    public function testOneValue(): void
    {
        $collection = new TestCollection([1]);
        static::assertTrue($collection->valid());

        $collection->clearWithoutRefreshValid();
        static::assertTrue($collection->valid());

        $collection->callRefreshValid();
        static::assertFalse($collection->valid());
    }

    public function testRefresh(): void
    {
        $collection = new TestCollection([1]);
        static::assertTrue($collection->valid());

        $collection->callRefreshValid();
        static::assertTrue($collection->valid());
    }
}
