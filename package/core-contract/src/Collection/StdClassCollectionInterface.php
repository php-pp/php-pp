<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface StdClassCollectionInterface extends CommonObjectCollectionInterface
{
    /** @return \stdClass|false */
    public function current();

    /** @param string|int $key */
    public function set($key, \stdClass $value): self;

    public function add(\stdClass $value): self;

    public function has(\stdClass $value): bool;

    /** @param string|int $key */
    public function get($key): \stdClass;

    public function fill(\stdClass $value, int $count, int $startIndex = 0): self;

    /** @param iterable<string|int, string|int> $keys */
    public function fillKeys(iterable $keys, \stdClass $value): self;

    /** @return array<string|int, object> */
    public function toArray(): array;
}
