<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractScalarCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractScalarCollection::isAllowString */
final class AllowStringTest extends TestCase
{
    public function testDefault(): void
    {
        static::assertTrue((new TestScalarCollection())->isAllowString());
    }

    public function testSet(): void
    {
        $collection = (new TestScalarCollection())->setAllowString();

        static::assertTrue($collection->isAllowString());
    }

    public function testSetTrue(): void
    {
        $collection = (new TestScalarCollection())->setAllowString(true);

        static::assertTrue($collection->isAllowString());
    }

    public function testSetFalse(): void
    {
        $collection = (new TestScalarCollection())->setAllowString(false);

        static::assertFalse($collection->isAllowString());
    }
}
