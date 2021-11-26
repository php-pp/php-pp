<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new StdClassCollection();
        $collection->has(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
