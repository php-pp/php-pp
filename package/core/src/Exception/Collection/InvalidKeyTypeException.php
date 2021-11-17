<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\{
    Collection\StringCollectionInterface,
    Exception\Collection\InvalidKeyTypeExceptionInterface,
};

class InvalidKeyTypeException extends CollectionException implements InvalidKeyTypeExceptionInterface
{
    public static function createFromAllowedTypes(StringCollectionInterface $types): self
    {
        /** @phpstan-ignore-next-line Unsafe usage of new static(). */
        return new static('Key should be of type ' . implode(', ', $types->toArray()) . '.');
    }
}
