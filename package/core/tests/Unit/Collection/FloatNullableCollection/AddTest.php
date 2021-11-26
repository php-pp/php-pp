<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new FloatNullableCollection();
        $collection->add(0.1);
        $this->addToAssertionCount(1);
    }
}
