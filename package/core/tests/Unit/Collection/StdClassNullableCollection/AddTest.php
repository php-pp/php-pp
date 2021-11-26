<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new StdClassNullableCollection();
        $collection->add(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
