<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new DateTimeNullableCollection([new \DateTime()]);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
