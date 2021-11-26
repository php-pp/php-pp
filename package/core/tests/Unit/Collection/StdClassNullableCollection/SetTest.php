<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new StdClassNullableCollection();
        $collection->set(0, new \stdClass());
        $this->addToAssertionCount(1);
    }
}
