<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Contract\Collection\StdClassCollectionInterface;

class StdClassCollection extends AbstractObjectCollection implements StdClassCollectionInterface
{
    /** @param iterable<\stdClass> $values */
    public function __construct(iterable $values = [])
    {
        parent::__construct($values);
    }

    /** @return static */
    public function setComparisonMode(int $mode): self
    {
        return $this->doSetComparisonMode($mode);
    }

    /** @return \stdClass|false */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, \stdClass $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(\stdClass $value): self
    {
        return $this->doAdd($value);
    }

    public function has(\stdClass $value): bool
    {
        return $this->doHas($value);
    }

    /** @param string|int $key */
    public function get($key): \stdClass
    {
        return $this->doGet($key);
    }

    /** @return static */
    public function fill(\stdClass $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, \stdClass $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @return array<string|int, \stdClass> */
    public function toArray(): array
    {
        return $this->values;
    }

    protected function getInstanceOf(): ?string
    {
        return \stdClass::class;
    }
}
