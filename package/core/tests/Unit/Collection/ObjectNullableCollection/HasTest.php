<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new ObjectNullableCollection();
        $collection->has(new \stdClass());
        $this->addToAssertionCount(1);
    }
}
