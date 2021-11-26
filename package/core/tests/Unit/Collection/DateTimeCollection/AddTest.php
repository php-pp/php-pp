<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new DateTimeCollection();
        $collection->add(new \DateTime());
        $this->addToAssertionCount(1);
    }
}
