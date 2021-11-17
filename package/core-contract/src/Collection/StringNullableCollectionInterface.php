<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface StringNullableCollectionInterface extends CollectionInterface, NullableInterface
{
    /** @return string|false|null */
    public function current();

    /** @param string|int $key */
    public function set($key, ?string $value): self;

    public function add(?string $value): self;

    public function has(?string $value): bool;

    /** @param string|int $key */
    public function get($key): ?string;

    public function fill(?string $value, int $count, int $startIndex = 0): self;

    /** @param iterable<string|int, string|int> $keys */
    public function fillKeys(iterable $keys, ?string $value): self;

    /** @return array<string|int, string|null> */
    public function toArray(): array;
}
