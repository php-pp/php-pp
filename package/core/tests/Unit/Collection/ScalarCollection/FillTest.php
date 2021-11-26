<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new ScalarCollection();
        $collection->fill('foo', 1);
        $this->addToAssertionCount(1);
    }
}
