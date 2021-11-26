<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new FloatNullableCollection();
        $collection->set(0, 0.1);
        $this->addToAssertionCount(1);
    }
}
