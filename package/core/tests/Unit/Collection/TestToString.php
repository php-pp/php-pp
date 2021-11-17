<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

final class TestToString
{
    private string $toString;

    public function __construct(string $toString = 'foo')
    {
        $this->toString = $toString;
    }

    public function __toString(): string
    {
        return $this->toString;
    }
}
