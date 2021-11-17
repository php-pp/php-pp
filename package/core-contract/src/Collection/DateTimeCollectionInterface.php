<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface DateTimeCollectionInterface extends CommonObjectCollectionInterface
{
    /** @return \DateTime|false */
    public function current();

    /** @param string|int $key */
    public function set($key, \DateTime $value): self;

    public function add(\DateTime $value): self;

    public function has(\DateTime $value): bool;

    /** @param string|int $key */
    public function get($key): \DateTime;

    public function fill(\DateTime $value, int $count, int $startIndex = 0): self;

    /** @param iterable<string|int, string|int> $keys */
    public function fillKeys(iterable $keys, \DateTime $value): self;

    /** @return array<string|int, \DateTime> */
    public function toArray(): array;
}
