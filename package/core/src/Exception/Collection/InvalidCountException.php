<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\InvalidCountExceptionInterface;

class InvalidCountException extends CollectionException implements InvalidCountExceptionInterface
{
    public static function createShouldBePositiveOr0(int $count, int $code = 0, \Throwable $previous = null): self
    {
        /** @phpstan-ignore-next-line Unsafe usage of new static(). */
        return new static('Value "' . $count . '" for "count" should be superior or equal to "0".', $code, $previous);
    }
}
