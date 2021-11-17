<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface IntegerNullableCollectionInterface extends CollectionInterface, NullableInterface
{
    /** @return int|false|null */
    public function current();

    /** @param string|int $key */
    public function set($key, ?int $value): self;

    public function add(?int $value): self;

    public function has(?int $value): bool;

    /** @param string|int $key */
    public function get($key): ?int;

    public function fill(?int $value, int $count, int $startIndex = 0): self;

    /** @param iterable<string|int, string|int> $keys */
    public function fillKeys(iterable $keys, ?int $value): self;

    /** @return array<string|int, int|null> */
    public function toArray(): array;
}
