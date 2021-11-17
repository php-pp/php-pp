<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Contract\Collection\FloatCollectionInterface;

class FloatCollection extends AbstractCollection implements FloatCollectionInterface
{
    /** @return float|false */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, float $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(float $value): self
    {
        return $this->doAdd($value);
    }

    /** @param string|int $key */
    public function get($key): float
    {
        return $this->doGet($key);
    }

    public function has(float $value): bool
    {
        return $this->doHas($value);
    }

    /** @return static */
    public function fill(float $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, float $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, float> */
    public function toArray(): array
    {
        return $this->values;
    }
}
