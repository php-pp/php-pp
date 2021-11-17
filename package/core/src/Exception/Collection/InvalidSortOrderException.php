<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\InvalidSortOrderExceptionInterface;

class InvalidSortOrderException extends CollectionException implements InvalidSortOrderExceptionInterface
{
    public function __construct(int $order, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Invalid sort order "' . $order . '".', $code, $previous);
    }
}
