<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new StringNullableCollection();
        $collection->add('foo');
        $this->addToAssertionCount(1);
    }
}
