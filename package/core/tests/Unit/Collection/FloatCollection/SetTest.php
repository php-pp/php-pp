<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new FloatCollection();
        $collection->set(0, 0.1);
        $this->addToAssertionCount(1);
    }
}
