<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new FloatCollection([0.1]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
