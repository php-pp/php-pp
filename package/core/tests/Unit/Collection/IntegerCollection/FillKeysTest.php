<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as IntegerCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new IntegerCollection();
        $collection->fillKeys(['foo', 'bar'], 0);
        $this->addToAssertionCount(1);
    }
}
