<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface ObjectNullableCollectionInterface extends CommonObjectCollectionInterface, NullableInterface
{
    /** @return object|false|null */
    public function current();

    /** @param string|int $key */
    public function set($key, ?object $value): self;

    public function add(?object $value): self;

    public function has(?object $value): bool;

    /** @param string|int $key */
    public function get($key): ?object;

    public function fill(?object $value, int $count, int $startIndex = 0): self;

    /** @param iterable<string|int, string|int> $keys */
    public function fillKeys(iterable $keys, ?object $value): self;

    /** @return array<string|int, object|null> */
    public function toArray(): array;
}
