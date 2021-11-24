<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new StringNullableCollection();
        $collection->set(0, 'foo');
        $this->addToAssertionCount(1);
    }
}
