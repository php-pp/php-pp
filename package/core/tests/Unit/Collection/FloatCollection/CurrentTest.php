<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new FloatCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
