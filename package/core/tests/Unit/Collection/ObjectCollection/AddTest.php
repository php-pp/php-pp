<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new ObjectCollection();
        $collection->add(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
