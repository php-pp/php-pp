<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\OutOfBoundsExceptionInterface;

class OutOfBoundsException extends CollectionException implements OutOfBoundsExceptionInterface
{
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Cannot read array: pointer is outside the limits of the array.', $code, $previous);
    }
}
