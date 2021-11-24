<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new ObjectCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
