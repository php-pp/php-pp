<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Exception\Collection;

use PhpPp\Core\Contract\Exception\Collection\InvalidPreserveKeysExceptionInterface;

class InvalidPreserveKeysException extends CollectionException implements InvalidPreserveKeysExceptionInterface
{
    public function __construct(int $preserveKeys, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Invalid preserve keys type "' . $preserveKeys . '".', $code, $previous);
    }
}
