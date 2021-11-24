<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new ObjectCollection([new \stdClass()]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
