<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\{
    Collection\DateTimeNullableCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\DateTimeNullableCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testDateTime(): void
    {
        $dateTime = new \DateTime();
        $collection = new DateTimeNullableCollection([$dateTime]);

        static::assertSame($dateTime, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new DateTimeNullableCollection($values);
    }

    protected function isAllowNull(): bool
    {
        return true;
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be instance of DateTime or null.';
    }
}
