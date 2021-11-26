<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new ScalarCollection(['foo']);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
