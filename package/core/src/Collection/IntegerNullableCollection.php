<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Component\Exception\Collection\InvalidValueTypeException;
use PhpPp\Core\Contract\Collection\IntegerNullableCollectionInterface;

class IntegerNullableCollection extends AbstractCollection implements IntegerNullableCollectionInterface
{
    /** @return int|false|null */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, ?int $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(?int $value): self
    {
        return $this->doAdd($value);
    }

    /** @param string|int $key */
    public function get($key): ?int
    {
        return $this->doGet($key);
    }

    public function has(?int $value): bool
    {
        return $this->doHas($value);
    }

    /** @return static */
    public function fill(?int $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, ?int $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, int|null> */
    public function toArray(): array
    {
        return $this->values;
    }

    /** @return static */
    protected function assertValueType($value): self
    {
        if (is_int($value) === false && is_null($value) === false) {
            throw InvalidValueTypeException::createFromAllowedTypes(new StringCollection(['integer', 'null']));
        }

        return $this;
    }
}
