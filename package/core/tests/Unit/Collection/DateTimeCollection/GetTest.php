<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new DateTimeCollection([new \DateTime()]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
