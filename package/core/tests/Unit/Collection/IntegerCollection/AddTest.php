<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new IntegerCollection();
        $collection->add(0);
        $this->addToAssertionCount(1);
    }
}
