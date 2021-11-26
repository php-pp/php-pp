<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new FloatNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
