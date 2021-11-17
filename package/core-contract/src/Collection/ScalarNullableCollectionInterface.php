<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface ScalarNullableCollectionInterface extends CollectionInterface, NullableInterface
{
    public function setAllowString(bool $allow = true): self;

    public function isAllowString(): bool;

    public function setAllowInteger(bool $allow = true): self;

    public function isAllowInteger(): bool;

    public function setAllowFloat(bool $allow = true): self;

    public function isAllowFloat(): bool;

    /** @return string|int|float|false|null */
    public function current();

    /**
     * @param string|int $key
     * @param string|int|float|null $value
     */
    public function set($key, $value): self;

    /** @param string|int|float|null $value */
    public function add($value): self;

    /** @param string|int|float|null $value */
    public function has($value): bool;

    /**
     * @param string|int $key
     * @return string|int|float|null
     */
    public function get($key);

    /** @param string|int|float|null $value */
    public function fill($value, int $count, int $startIndex = 0): self;

    /**
     * @param string|int|float|null $value
     * @param iterable<string|int, string|int> $keys
     */
    public function fillKeys(iterable $keys, $value): self;

    /** @return array<string|int, string|int|float|null> */
    public function toArray(): array;
}
