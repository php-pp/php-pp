<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new DateTimeCollection();
        $collection->set(0, new \DateTime());
        $this->addToAssertionCount(1);
    }
}
