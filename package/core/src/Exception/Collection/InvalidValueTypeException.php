<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\{
    Collection\StringCollectionInterface,
    Exception\Collection\InvalidValueTypeExceptionInterface
};

class InvalidValueTypeException extends CollectionException implements InvalidValueTypeExceptionInterface
{
    public static function createFromAllowedTypes(
        StringCollectionInterface $types,
        int $code = 0,
        \Throwable $previous = null
    ): self {
        /** @phpstan-ignore-next-line Unsafe usage of new static(). */
        return new static(
            'Value should be of type ' . implode(', ', $types->toArray()) . '.',
            $code,
            $previous
        );
    }
}
