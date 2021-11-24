<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new IntegerNullableCollection([0]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
