<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\ValueAlreadyExistsExceptionInterface;

class ValueAlreadyExistsException extends CollectionException implements ValueAlreadyExistsExceptionInterface
{
    public function __construct(string $value, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Value "' . $value . '" already exists.', $code, $previous);
    }
}
