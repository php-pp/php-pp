<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

final class TestIterator implements \Iterator
{
    /** @var array<mixed> */
    private array $values;

    private bool $valid = true;

    /** @param array<mixed>|null $values */
    public function __construct(array $values = null)
    {
        $this->values = is_array($values)
            ? $values :
            [
                1,
                1.2,
                'foo',
                true,
                // false, # current() return false when array internal pointer is at the end of the array
                ['bar'],
                new \stdClass()
            ];
    }

    /** @return string|int|null */
    public function key()
    {
        return $this->valid() ? key($this->values) : null;
    }

    public function valid(): bool
    {
        return $this->valid;
    }

    public function next(): void
    {
        $this->valid = next($this->values) !== false;
    }

    /** @return mixed */
    public function current()
    {
        $return = current($this->values);

        return ($return === false) ? null : $return;
    }

    public function rewind(): void
    {
        reset($this->values);
        $this->valid = count($this->values) > 0;
    }
}
