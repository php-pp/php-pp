<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\KeyNotFoundExceptionInterface;

class KeyNotFoundException extends CollectionException implements KeyNotFoundExceptionInterface
{
    /** @param string|int|float|bool|null $key */
    public function __construct($key, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Key "' . ((string) $key) . '" not found.', $code, $previous);
    }
}
