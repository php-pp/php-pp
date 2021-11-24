<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new StringNullableCollection();
        $collection->has('foo');
        $this->addToAssertionCount(1);
    }
}
