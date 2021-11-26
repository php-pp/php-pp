<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new ScalarNullableCollection();
        $collection->add('foo');
        $this->addToAssertionCount(1);
    }
}
