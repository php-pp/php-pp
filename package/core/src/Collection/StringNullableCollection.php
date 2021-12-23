<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Component\Exception\Collection\InvalidValueTypeException;
use PhpPp\Core\Contract\Collection\StringNullableCollectionInterface;

class StringNullableCollection extends AbstractCollection implements StringNullableCollectionInterface
{
    /** @return string|false|null */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, ?string $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(?string $value): self
    {
        return $this->doAdd($value);
    }

    /** @param string|int $key */
    public function get($key): ?string
    {
        return $this->doGet($key);
    }

    public function has(?string $value): bool
    {
        return $this->doHas($value);
    }

    /** @return static */
    public function fill(?string $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, ?string $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, string|null> */
    public function toArray(): array
    {
        return $this->values;
    }

    /** @return static */
    protected function assertValueType($value): self
    {
        if (is_string($value) === false && is_null($value) === false) {
            throw InvalidValueTypeException::createFromAllowedTypes(new StringCollection(['string', 'null']));
        }

        return $this;
    }
}
