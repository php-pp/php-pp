<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new ScalarNullableCollection();
        $collection->has('foo');
        $this->addToAssertionCount(1);
    }
}
