<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new FloatNullableCollection([0.1]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
