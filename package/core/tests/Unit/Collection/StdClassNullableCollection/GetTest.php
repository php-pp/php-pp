<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new StdClassNullableCollection([new \stdClass()]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
