<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Iterable;

use PhpPp\Core\Contract\Array_\ToArrayInterface;

class IterableUtils
{
    /**
     * I always try to have only one return statement
     * But here we work on an iterable, and we don't know it's size
     * To not duplicate a huge array we use return as often as possible
     *
     * @param iterable<mixed> $iterable
     * @return array<string|int, mixed>
     */
    public static function toArray(iterable $iterable): array
    {
        if (is_array($iterable)) {
            return $iterable;
        }

        if ($iterable instanceof ToArrayInterface) {
            return $iterable->toArray();
        }

        $return = [];
        foreach ($iterable as $key => $value) {
            $return[$key] = $value;
        }

        return $return;
    }
}
