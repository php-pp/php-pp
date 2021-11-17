<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Contract\Collection\ScalarCollectionInterface;

class ScalarCollection extends AbstractScalarCollection implements ScalarCollectionInterface
{
    use CountValuesTrait;

    /** @return static */
    public function setAllowString(bool $allow = true): self
    {
        $this->allowString = $allow;

        return $this;
    }

    /** @return static */
    public function setAllowInteger(bool $allow = true): self
    {
        $this->allowInteger = $allow;

        return $this;
    }

    /** @return static */
    public function setAllowFloat(bool $allow = true): self
    {
        $this->allowFloat = $allow;

        return $this;
    }

    /** @return string|int|float|false */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @param string|int|float $value
     * @return static
     */
    public function set($key, $value): self
    {
        return $this->doSet($key, $value);
    }

    /**
     * @param string|int|float $value
     * @return static
     */
    public function add($value): self
    {
        return $this->doAdd($value);
    }

    /** @param string|int|float $value */
    public function has($value): bool
    {
        return $this->doHas($value);
    }

    /**
     * @param string|int $key
     * @return string|int|float
     */
    public function get($key)
    {
        return $this->doGet($key);
    }

    /**
     * @param string|int|float $value
     * @return static
     */
    public function fill($value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @param string|int|float $value
     * @return static
     */
    public function fillKeys(iterable $keys, $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, string|int|float> */
    public function toArray(): array
    {
        return $this->values;
    }
}
