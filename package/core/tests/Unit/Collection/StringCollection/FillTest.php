<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringCollection;

use PhpPp\Core\Component\Collection\StringCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringCollection::fill */
final class FillTest extends TestCase
{
    /**
     * This test can't test anything as StringCollection::fill() only call parent::doFill()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection\FillTest
     */
    public function testFill(): void
    {
        $collection = new StringCollection();
        $collection->fill('foo', 1);
        $this->addToAssertionCount(1);
    }
}
