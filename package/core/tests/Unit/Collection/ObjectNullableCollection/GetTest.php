<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new ObjectNullableCollection([new \stdClass()]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
