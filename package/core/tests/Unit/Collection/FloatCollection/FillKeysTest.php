<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\FloatCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as FloatCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new FloatCollection();
        $collection->fillKeys(['foo', 'bar'], 0.1);
        $this->addToAssertionCount(1);
    }
}
