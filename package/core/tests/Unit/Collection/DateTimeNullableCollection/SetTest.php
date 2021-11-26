<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new DateTimeNullableCollection();
        $collection->set(0, new \DateTime());
        $this->addToAssertionCount(1);
    }
}
