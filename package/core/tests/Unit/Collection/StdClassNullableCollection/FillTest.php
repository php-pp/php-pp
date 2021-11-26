<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new StdClassNullableCollection();
        $collection->fill(new \stdClass(), 1);
        $this->addToAssertionCount(1);
    }
}
