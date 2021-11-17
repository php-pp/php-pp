<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PhpPp\Core\Component\{
    Collection\ScalarCollection,
    Iterable\IterableUtils
};

trait AssertKeysOrderTrait
{
    /** @param iterable<mixed> $iterable */
    public static function assertKeysOrder(iterable $iterable, ScalarCollection $keys): void
    {
        $keyIndex = 0;
        foreach (array_keys(IterableUtils::toArray($iterable)) as $key) {
            $expectedKey = $keys->get($keyIndex);
            static::assertSame(
                $expectedKey,
                $key,
                'Key number ' . $keyIndex . ' should be "' . $expectedKey . '" but is "' . $key . '".'
            );

            $keyIndex++;
        }
    }
}
