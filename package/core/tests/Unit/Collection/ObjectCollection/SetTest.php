<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new ObjectCollection();
        $collection->set(0, new \stdClass());
        $this->addToAssertionCount(1);
    }
}
