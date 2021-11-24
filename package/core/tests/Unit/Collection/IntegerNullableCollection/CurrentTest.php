<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new IntegerNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
