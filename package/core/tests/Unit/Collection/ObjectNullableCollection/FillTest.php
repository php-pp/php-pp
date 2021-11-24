<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new ObjectNullableCollection();
        $collection->fill(new \stdClass(), 1);
        $this->addToAssertionCount(1);
    }
}
