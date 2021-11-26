<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new DateTimeCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
