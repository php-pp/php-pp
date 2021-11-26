<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as FloatNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new FloatNullableCollection();
        $collection->fillKeys(['foo', 'bar'], 0.1);
        $this->addToAssertionCount(1);
    }
}
