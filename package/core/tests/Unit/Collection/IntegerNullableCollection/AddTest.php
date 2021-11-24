<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new IntegerNullableCollection();
        $collection->add(0);
        $this->addToAssertionCount(1);
    }
}
