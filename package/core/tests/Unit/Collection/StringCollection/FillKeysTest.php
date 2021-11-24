<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringCollection;

use PhpPp\Core\Component\Collection\StringCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as StringCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new StringCollection();
        $collection->fillKeys(['foo', 'bar'], 'baz');
        $this->addToAssertionCount(1);
    }
}
