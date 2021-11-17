<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PhpPp\Core\Component\Collection\AbstractObjectCollection;

class TestObjectNullableCollection extends AbstractObjectCollection
{
    /** @var array<string|int, mixed> */
    protected array $values;

    protected bool $valid = true;

    /** @param string|int $key */
    public function get($key): object
    {
        return $this->doGet($key);
    }

    public function callDoSetComparisonMode(int $mode): self
    {
        return $this->doSetComparisonMode($mode);
    }

    /** @return string|int|null */
    public function key()
    {
        return $this->valid() ? key($this->values) : null;
    }

    public function valid(): bool
    {
        return $this->valid;
    }

    public function next(): void
    {
        $this->valid = next($this->values) !== false;
    }

    /** @return object|false|null */
    public function current()
    {
        $return = current($this->values);

        return ($return === false) ? null : $return;
    }

    public function rewind(): void
    {
        reset($this->values);
        $this->valid = count($this->values) > 0;
    }

    /** @return array<string|int, object|null> */
    public function toArray(): array
    {
        return $this->values;
    }

    /** @param mixed $value */
    public function callCastValueToString($value): string
    {
        return $this->castValueToString($value);
    }

    /** @param mixed $value */
    public function callAssertValueType($value): self
    {
        return $this->assertValueType($value);
    }

    protected function getInstanceOf(): ?string
    {
        return null;
    }
}
