<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new ObjectNullableCollection();
        $collection->add(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
