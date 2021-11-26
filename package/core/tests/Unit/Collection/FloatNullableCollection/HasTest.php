<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new FloatNullableCollection();
        $collection->has(0.1);
        $this->addToAssertionCount(1);
    }
}
