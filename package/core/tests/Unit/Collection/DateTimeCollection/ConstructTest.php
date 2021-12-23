<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\DateTimeCollection;

use PhpPp\Core\Component\{
    Collection\DateTimeCollection,
    Tests\Unit\Collection\AbstractConstructTest
};
use PhpPp\Core\Contract\Collection\CollectionInterface;

/** @covers \PhpPp\Core\Component\Collection\DateTimeCollection::__construct */
final class ConstructTest extends AbstractConstructTest
{
    public function testDateTime(): void
    {
        $dateTime = new \DateTime();
        $collection = new DateTimeCollection([$dateTime]);

        static::assertSame($dateTime, $collection->get(0));
    }

    /** @param array<string|int, mixed> $values */
    protected function createCollection(array $values): CollectionInterface
    {
        return new DateTimeCollection($values);
    }

    protected function getExceptionMessage(): string
    {
        return 'Value should be instance of DateTime.';
    }
}
