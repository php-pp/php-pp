<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new ObjectNullableCollection();
        $collection->set(0, new \stdClass());
        $this->addToAssertionCount(1);
    }
}
