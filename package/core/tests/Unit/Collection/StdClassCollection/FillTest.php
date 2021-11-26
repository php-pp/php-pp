<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new StdClassCollection();
        $collection->fill(new \stdClass(), 1);
        $this->addToAssertionCount(1);
    }
}
