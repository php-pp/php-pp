<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::get */
final class GetTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::get() only call parent::doGet()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\GetTest
     */
    public function testGet(): void
    {
        $collection = new StringNullableCollection(['foo']);
        $collection->get(0);
        $this->addToAssertionCount(1);
    }
}
