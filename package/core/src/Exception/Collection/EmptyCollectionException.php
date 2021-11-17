<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\EmptyCollectionExceptionInterface;

class EmptyCollectionException extends CollectionException implements EmptyCollectionExceptionInterface
{
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Collection is empty.', $code, $previous);
    }
}
