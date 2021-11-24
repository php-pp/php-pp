<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new IntegerCollection([0]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
