<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringNullableCollection;

use PhpPp\Core\Component\Collection\StringNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as StringNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new StringNullableCollection();
        $collection->fillKeys(['foo', 'bar'], 'baz');
        $this->addToAssertionCount(1);
    }
}
