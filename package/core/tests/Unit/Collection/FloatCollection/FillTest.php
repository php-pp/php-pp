<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new FloatCollection();
        $collection->fill(0.1, 1);
        $this->addToAssertionCount(1);
    }
}
