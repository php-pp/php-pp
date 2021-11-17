<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Contract\Collection\StringCollectionInterface;

class StringCollection extends AbstractCollection implements StringCollectionInterface
{
    use CountValuesTrait;

    /** @return string|false */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, string $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(string $value): self
    {
        return $this->doAdd($value);
    }

    /** @param string|int $key */
    public function get($key): string
    {
        return $this->doGet($key);
    }

    public function has(string $value): bool
    {
        return $this->doHas($value);
    }

    /** @return static */
    public function fill(string $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, string $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, string> */
    public function toArray(): array
    {
        return $this->values;
    }
}
