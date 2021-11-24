<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new ObjectCollection();
        $collection->fill(new \stdClass(), 1);
        $this->addToAssertionCount(1);
    }
}
