<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ScalarCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as ScalarCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new ScalarCollection();
        $collection->fillKeys(['foo', 'bar'], 'baz');
        $this->addToAssertionCount(1);
    }
}
