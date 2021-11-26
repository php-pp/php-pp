<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new StdClassCollection([new \stdClass()]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
