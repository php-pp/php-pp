<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new StdClassCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
