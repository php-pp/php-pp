<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new ObjectNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
