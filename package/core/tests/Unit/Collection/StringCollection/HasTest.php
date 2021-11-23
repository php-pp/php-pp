<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\StringCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Collection\StringCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\StringCollection::has */
final class HasTest extends TestCase
{
    use AssertKeysOrderTrait;

    /**
     * This test can't test anything as StringCollection::has() only call parent::doHas()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection\HasTest
     */
    public function testFillKeys(): void
    {
        $collection = new StringCollection();
        $collection->has('foo');
        $this->addToAssertionCount(1);
    }
}
