<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Tests\Unit\Collection\AssertKeysOrderTrait,
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestNullableCollection
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\CountValuesTrait::countValues */
final class CountValuesTraitTest extends TestCase
{
    use AssertKeysOrderTrait;

    public function testEmpty(): void
    {
        static::assertCount(0, (new TestCollection())->countValues());
    }

    public function testStringValues(): void
    {
        $collection = new TestCollection(['foo', 'bar', 'foo', 'bar', 'foo', 'baz']);
        $countValues = $collection->countValues();

        static::assertCount(3, $countValues);
        static::assertKeysOrder($countValues, new ScalarCollection(['foo', 'bar', 'baz']));
        static::assertEquals(3, $countValues->get('foo'));
        static::assertEquals(2, $countValues->get('bar'));
        static::assertEquals(1, $countValues->get('baz'));
    }

    public function testIntegerValues(): void
    {
        $collection = new TestCollection([10, 20, 10, 20, 10, 30]);
        $countValues = $collection->countValues();

        static::assertCount(3, $countValues);
        static::assertKeysOrder($countValues, new ScalarCollection([10, 20, 30]));
        static::assertEquals(3, $countValues->get(10));
        static::assertEquals(2, $countValues->get(20));
        static::assertEquals(1, $countValues->get(30));
    }

    public function testFloatValue(): void
    {
        $collection = new TestCollection([10.0]);

        $this->expectWarning();
        $this->expectArrayCountValuesWarning();
        $collection->countValues();
    }

    public function testNullValue(): void
    {
        $collection = new TestNullableCollection([null]);

        $this->expectWarning();
        $this->expectArrayCountValuesWarning();
        $collection->countValues();
    }

    public function testArrayValue(): void
    {
        $collection = new TestNullableCollection([['foo']]);

        $this->expectWarning();
        $this->expectArrayCountValuesWarning();
        $collection->countValues();
    }

    public function testObjectValue(): void
    {
        $collection = new TestNullableCollection([new \stdClass()]);

        $this->expectWarning();
        $this->expectArrayCountValuesWarning();
        $collection->countValues();
    }

    private function expectArrayCountValuesWarning(): self
    {
        $this->expectWarningMessage(
            version_compare(PHP_VERSION, '8.0.0') <= 0
                ? 'array_count_values(): Can only count STRING and INTEGER values!'
                : 'array_count_values(): Can only count string and integer values, entry skipped'
        );

        return $this;
    }
}
