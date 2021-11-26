<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new DateTimeNullableCollection();
        $collection->fill(new \DateTime(), 1);
        $this->addToAssertionCount(1);
    }
}
