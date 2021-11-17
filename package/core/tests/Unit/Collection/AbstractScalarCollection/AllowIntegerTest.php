<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractScalarCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractScalarCollection::isAllowInteger */
final class AllowIntegerTest extends TestCase
{
    public function testDefault(): void
    {
        static::assertTrue((new TestScalarCollection())->isAllowInteger());
    }

    public function testSet(): void
    {
        $collection = (new TestScalarCollection())->setAllowInteger();

        static::assertTrue($collection->isAllowInteger());
    }

    public function testSetTrue(): void
    {
        $collection = (new TestScalarCollection())->setAllowInteger(true);

        static::assertTrue($collection->isAllowInteger());
    }

    public function testSetFalse(): void
    {
        $collection = (new TestScalarCollection())->setAllowInteger(false);

        static::assertFalse($collection->isAllowInteger());
    }
}
