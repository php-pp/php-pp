<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PhpPp\Core\Contract\Array_\ToArrayInterface;

final class TestToArray implements ToArrayInterface, \Iterator
{
    /** @var array<string|int, mixed> */
    private array $values;

    /** @param array<string|int, mixed> $values */
    public function __construct(array $values = null)
    {
        if (is_array($values) === false) {
            $values = [
                1,
                1.2,
                'foo',
                true,
                false,
                ['bar'],
                new \stdClass()
            ];
        }

        $this->values = $values;
    }

    public function toArray(): array
    {
        return $this->values;
    }

    public function current(): void
    {
        throw new \Exception('Should not be called, ony for tests.');
    }

    public function next(): void
    {
        throw new \Exception('Should not be called, ony for tests.');
    }

    public function key(): void
    {
        throw new \Exception('Should not be called, ony for tests.');
    }

    public function valid(): bool
    {
        throw new \Exception('Should not be called, ony for tests.');
    }

    public function rewind(): void
    {
        throw new \Exception('Should not be called, ony for tests.');
    }
}
