<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface FloatNullableCollectionInterface extends CollectionInterface, NullableInterface
{
    /** @return float|false|null */
    public function current();

    /** @param string|int $key */
    public function set($key, ?float $value): self;

    public function add(?float $value): self;

    public function has(?float $value): bool;

    /** @param string|int $key */
    public function get($key): ?float;

    public function fill(?float $value, int $count, int $startIndex = 0): self;

    /** @param iterable<string|int, string|int> $keys */
    public function fillKeys(iterable $keys, ?float $value): self;

    /** @return array<string|int, float|null> */
    public function toArray(): array;
}
