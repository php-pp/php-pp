<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as StdClassNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new StdClassNullableCollection();
        $collection->fillKeys(['foo', 'bar'], new \stdClass());
        $this->addToAssertionCount(1);
    }
}
