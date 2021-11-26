<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new ScalarNullableCollection();
        $collection->set(0, 'foo');
        $this->addToAssertionCount(1);
    }
}
