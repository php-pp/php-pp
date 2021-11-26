<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new FloatCollection();
        $collection->add(0.1);
        $this->addToAssertionCount(1);
    }
}
