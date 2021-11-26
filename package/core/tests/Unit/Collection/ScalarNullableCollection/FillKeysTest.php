<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as ScalarNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new ScalarNullableCollection();
        $collection->fillKeys(['foo', 'bar'], 'baz');
        $this->addToAssertionCount(1);
    }
}
