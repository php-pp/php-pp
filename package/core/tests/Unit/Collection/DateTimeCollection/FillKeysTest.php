<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::fillKeys */
final class FillKeysTest extends TestCase
{
    /**
     * This test can't test anything as DateTimeCollection::fillKeys() only call parent::doFillKeys()
     * @see \PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection\FillKeysTest
     */
    public function testFillKeys(): void
    {
        $collection = new DateTimeCollection();
        $collection->fillKeys(['foo', 'bar'], new \DateTime());
        $this->addToAssertionCount(1);
    }
}
