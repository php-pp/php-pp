<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractScalarCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractScalarCollection::isAllowFloat */
final class AllowFloatTest extends TestCase
{
    public function testDefault(): void
    {
        static::assertTrue((new TestScalarCollection())->isAllowFloat());
    }

    public function testSet(): void
    {
        $collection = (new TestScalarCollection())->setAllowFloat();

        static::assertTrue($collection->isAllowFloat());
    }

    public function testSetTrue(): void
    {
        $collection = (new TestScalarCollection())->setAllowFloat(true);

        static::assertTrue($collection->isAllowFloat());
    }

    public function testSetFalse(): void
    {
        $collection = (new TestScalarCollection())->setAllowFloat(false);

        static::assertFalse($collection->isAllowFloat());
    }
}
