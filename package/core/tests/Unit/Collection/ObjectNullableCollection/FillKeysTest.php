<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\ObjectNullableCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as ObjectNullableCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new ObjectNullableCollection();
        $collection->fillKeys(['foo', 'bar'], new \stdClass());
        $this->addToAssertionCount(1);
    }
}
