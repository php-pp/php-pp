<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new DateTimeNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
