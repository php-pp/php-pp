<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new DateTimeCollection();
        $collection->fill(new \DateTime(), 1);
        $this->addToAssertionCount(1);
    }
}
