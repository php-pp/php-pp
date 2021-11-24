<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\IntegerNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as IntegerNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new IntegerNullableCollection();
        $collection->fillKeys(['foo', 'bar'], 0);
        $this->addToAssertionCount(1);
    }
}
