<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new IntegerNullableCollection();
        $collection->set(0, 0);
        $this->addToAssertionCount(1);
    }
}
