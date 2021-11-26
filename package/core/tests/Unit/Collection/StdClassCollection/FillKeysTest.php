<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StdClassCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as StdClassCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new StdClassCollection();
        $collection->fillKeys(['foo', 'bar'], new \stdClass());
        $this->addToAssertionCount(1);
    }
}
