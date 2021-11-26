<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new StdClassCollection();
        $collection->add(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
