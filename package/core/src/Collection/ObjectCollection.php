<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Contract\Collection\ObjectCollectionInterface;

class ObjectCollection extends AbstractObjectCollection implements ObjectCollectionInterface
{
    /** @return static */
    public function setComparisonMode(int $mode): ObjectCollectionInterface
    {
        return $this->doSetComparisonMode($mode);
    }

    /** @return object|false */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, object $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(object $value): self
    {
        return $this->doAdd($value);
    }

    /** @param string|int $key */
    public function get($key): object
    {
        return $this->doGet($key);
    }

    public function has(object $value): bool
    {
        return $this->doHas($value);
    }

    /** @return static */
    public function fill(object $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, object $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, object> */
    public function toArray(): array
    {
        return $this->values;
    }

    protected function getInstanceOf(): ?string
    {
        return null;
    }
}
