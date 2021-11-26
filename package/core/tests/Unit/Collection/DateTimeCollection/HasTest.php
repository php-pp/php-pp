<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::has */
final class HasTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\HasTest
     */
    public function testHas(): void
    {
        $collection = new DateTimeCollection();
        $collection->has(new \DateTime());
        $this->addToAssertionCount(1);
    }
}
