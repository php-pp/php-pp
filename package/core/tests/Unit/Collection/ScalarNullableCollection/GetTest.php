<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new ScalarNullableCollection(['foo']);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
