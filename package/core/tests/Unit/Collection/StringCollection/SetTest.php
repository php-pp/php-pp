<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringCollection;

use PhpPp\Core\Component\Collection\StringCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringCollection::set */
final class SetTest extends TestCase
{
    /**
     * This test can't test anything as StringCollection::set() only call parent::doSet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection\SetTest
     */
    public function testSet(): void
    {
        $collection = new StringCollection();
        $collection->set(0, 'foo');
        $this->addToAssertionCount(1);
    }
}
