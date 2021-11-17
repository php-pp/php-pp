<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Array_;

interface ToArrayInterface
{
    /** @return array<string|int, mixed> */
    public function toArray(): array;
}
