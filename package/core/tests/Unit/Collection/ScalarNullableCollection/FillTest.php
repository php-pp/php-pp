<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new ScalarNullableCollection();
        $collection->fill('foo', 1);
        $this->addToAssertionCount(1);
    }
}
