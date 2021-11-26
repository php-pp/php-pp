<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new StdClassNullableCollection();
        $collection->has(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
