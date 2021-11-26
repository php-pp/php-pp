<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new ScalarNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
