<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new IntegerCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
