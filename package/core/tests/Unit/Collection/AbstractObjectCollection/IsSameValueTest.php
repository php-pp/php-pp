<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractObjectCollection;

use PhpPp\Core\Component\{
    Exception\Collection\CollectionException,
    Tests\Unit\Collection\TestObjectCollection,
    Tests\Unit\Collection\TestToString
};
use PhpPp\Core\Contract\Collection\CommonObjectCollectionInterface;
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractObjectCollection::isSameValues */
final class IsSameValueTest extends TestCase
{
    public function testModeHash(): void
    {
        $stdClass = new \stdClass();
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_OBJECT_HASH);

        static::assertTrue($collection->callIsSameValues($stdClass, $stdClass));
    }

    public function testModeHashNotEquals(): void
    {
        $firstValue = new \stdClass();
        $secondValue = new \stdClass();
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_OBJECT_HASH);

        static::assertFalse($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeEquals(): void
    {
        $firstValue = new \stdClass();
        $firstValue->foo = 'foo';

        $secondValue = new \stdClass();
        $secondValue->foo = 'foo';

        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_EQUALS);

        static::assertTrue($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeEqualsNotEquals(): void
    {
        $firstValue = new \stdClass();
        $firstValue->foo = 'foo';

        $secondValue = new \stdClass();
        $secondValue->foo = 'bar';

        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_EQUALS);

        static::assertFalse($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeEqualsNotSameInstance(): void
    {
        $firstValue = new \stdClass();
        $firstValue->foo = 'foo';

        $secondValue = new TestToString();

        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_EQUALS);

        static::assertFalse($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeEqualsToStringObject(): void
    {
        $firstValue = new TestToString();
        $secondValue = new TestToString();
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_EQUALS);

        static::assertTrue($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeEqualsToStringObjectNotEquals(): void
    {
        $firstValue = new TestToString();
        $secondValue = new TestToString('bar');
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_EQUALS);

        static::assertFalse($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeString(): void
    {
        $firstValue = new TestToString();
        $secondValue = new TestToString();
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_STRING);

        static::assertTrue($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeStringNotEquals(): void
    {
        $firstValue = new TestToString();
        $secondValue = new TestToString('bar');
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(CommonObjectCollectionInterface::COMPARISON_STRING);

        static::assertFalse($collection->callIsSameValues($firstValue, $secondValue));
    }

    public function testModeUnknown(): void
    {
        $collection = (new TestObjectCollection())
            ->callDoSetComparisonMode(42);

        $this->expectException(CollectionException::class);
        $this->expectExceptionMessage('Unknown comparison mode "42".');
        $this->expectExceptionCode(0);
        $collection->callIsSameValues(null, null);
    }
}
