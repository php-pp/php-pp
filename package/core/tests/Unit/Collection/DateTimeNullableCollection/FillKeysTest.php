<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new DateTimeNullableCollection();
        $collection->fillKeys(['foo', 'bar'], new \DateTime());
        $this->addToAssertionCount(1);
    }
}
