<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new IntegerNullableCollection();
        $collection->has(0);
        $this->addToAssertionCount(1);
    }
}
