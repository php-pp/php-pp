<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new ScalarCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
