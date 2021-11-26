<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new StdClassNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
