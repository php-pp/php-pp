<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::add */
final class AddTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::add() only call parent::doAdd()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\AddTest
     */
    public function testAdd(): void
    {
        $collection = new ScalarCollection();
        $collection->add('foo');
        $this->addToAssertionCount(1);
    }
}
