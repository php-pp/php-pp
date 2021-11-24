<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringCollection;

use PhpPp\Core\Component\Collection\StringCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as StringCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new StringCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
