<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new IntegerCollection();
        $collection->has(0);
        $this->addToAssertionCount(1);
    }
}
