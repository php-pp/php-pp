<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new StdClassCollection();
        $collection->set(0, new \stdClass());
        $this->addToAssertionCount(1);
    }
}
