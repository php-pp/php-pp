<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new ObjectCollection();
        $collection->has(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
