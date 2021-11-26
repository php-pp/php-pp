<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new ScalarCollection();
        $collection->has('foo');
        $this->addToAssertionCount(1);
    }
}
