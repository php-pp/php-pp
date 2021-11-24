<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new IntegerNullableCollection();
        $collection->fill(0, 1);
        $this->addToAssertionCount(1);
    }
}
