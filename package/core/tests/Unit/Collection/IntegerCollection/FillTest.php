<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new IntegerCollection();
        $collection->fill(0, 1);
        $this->addToAssertionCount(1);
    }
}
