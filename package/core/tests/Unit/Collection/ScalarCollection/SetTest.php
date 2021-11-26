<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new ScalarCollection();
        $collection->set(0, 'foo');
        $this->addToAssertionCount(1);
    }
}
