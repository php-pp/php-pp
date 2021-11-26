<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new FloatCollection();
        $collection->has(0.1);
        $this->addToAssertionCount(1);
    }
}
