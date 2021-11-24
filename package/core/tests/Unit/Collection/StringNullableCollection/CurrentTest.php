<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::current */
final class CurrentTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::current() only call parent::doCurrent()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\CurrentTest
     */
    public function testCurrent(): void
    {
        $collection = new StringNullableCollection();
        $collection->current();
        $this->addToAssertionCount(1);
    }
}
