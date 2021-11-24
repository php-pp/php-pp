<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as ObjectCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new ObjectCollection();
        $collection->fillKeys(['foo', 'bar'], new \stdClass());
        $this->addToAssertionCount(1);
    }
}
