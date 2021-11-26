<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new DateTimeNullableCollection();
        $collection->has(new \DateTime());
        $this->addToAssertionCount(1);
    }
}
