<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new StringNullableCollection();
        $collection->fill('foo', 1);
        $this->addToAssertionCount(1);
    }
}
