<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new IntegerCollection();
        $collection->set(0, 0);
        $this->addToAssertionCount(1);
    }
}
