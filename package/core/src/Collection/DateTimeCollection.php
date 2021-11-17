<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Contract\Collection\DateTimeCollectionInterface;

class DateTimeCollection extends AbstractObjectCollection implements DateTimeCollectionInterface
{
    /** @param iterable<\DateTime> $values */
    public function __construct(iterable $values = [])
    {
        parent::__construct($values);
    }

    /** @return static */
    public function setComparisonMode(int $mode): DateTimeCollectionInterface
    {
        return $this->doSetComparisonMode($mode);
    }

    /** @return \DateTime|false */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return static
     */
    public function set($key, \DateTime $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @return static */
    public function add(\DateTime $value): self
    {
        return $this->doAdd($value);
    }

    public function has(\DateTime $value): bool
    {
        return $this->doHas($value);
    }

    /** @param string|int $key */
    public function get($key): \DateTime
    {
        return $this->doGet($key);
    }

    /** @return array<string|int, \DateTime> */
    public function toArray(): array
    {
        return $this->values;
    }

    /** @return static */
    public function fill(\DateTime $value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<string|int, string|int> $keys
     * @return static
     */
    public function fillKeys(iterable $keys, \DateTime $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    protected function getInstanceOf(): ?string
    {
        return \DateTime::class;
    }
}
