<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new FloatNullableCollection();
        $collection->fill(0.1, 1);
        $this->addToAssertionCount(1);
    }
}
