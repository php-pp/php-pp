<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new DateTimeNullableCollection();
        $collection->add(new \DateTime());
        $this->addToAssertionCount(1);
    }
}
