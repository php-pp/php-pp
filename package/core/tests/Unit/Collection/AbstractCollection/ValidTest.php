<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\Tests\Unit\Collection\TestCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::valid */
final class ValidTest extends TestCase
{
    public function testEmpty(): void
    {
        static::assertFalse((new TestCollection())->valid());
    }

    public function testValid(): void
    {
        static::assertTrue((new TestCollection([1]))->valid());
    }
}
