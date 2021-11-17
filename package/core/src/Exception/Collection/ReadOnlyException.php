<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\ReadOnlyExceptionInterface;

class ReadOnlyException extends CollectionException implements ReadOnlyExceptionInterface
{
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('This collection is read only, you cannot edit it\'s values.', $code, $previous);
    }
}
