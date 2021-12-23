<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PhpPp\Core\Component\{
    Collection\AbstractCollection,
    Collection\CountValuesTrait
};

class TestCollection extends AbstractCollection
{
    use CountValuesTrait;

    /** @return mixed */
    public function current()
    {
        return parent::doCurrent();
    }

    /**
     * @param string|int $key
     * @return mixed
     */
    public function get($key)
    {
        return parent::doGet($key);
    }

    /** @return array<string|int, mixed> */
    public function toArray(): array
    {
        return $this->values;
    }

    public function clearWithoutRefreshValid(): self
    {
        $this->values = [];

        return $this;
    }

    /**
     * @param string|int $key
     * @param mixed $value
     */
    public function callDoSet($key, $value): self
    {
        return $this->doSet($key, $value);
    }

    /** @param mixed $value */
    public function callDoAdd($value): self
    {
        return $this->doAdd($value);
    }

    /** @param mixed $value */
    public function callDoHas($value): bool
    {
        return $this->doHas($value);
    }

    public function callRefreshValid(): self
    {
        return $this->refreshValid();
    }

    /** @param mixed $value */
    public function callCastValueToString($value): string
    {
        return $this->castValueToString($value);
    }

    /**
     * @param mixed $key
     * @return mixed
     */
    public function callDoGet($key)
    {
        return $this->doGet($key);
    }

    /** @param mixed $value */
    public function callDoFill($value, int $count, int $startIndex = 0): self
    {
        return $this->doFill($value, $count, $startIndex);
    }

    /**
     * @param iterable<mixed> $keys
     * @param mixed $value
     */
    public function callDoFillKeys(iterable $keys, $value): self
    {
        return $this->doFillKeys($keys, $value);
    }

    /** @param string|int $key */
    public function callAssertKeyType($key): self
    {
        return $this->assertKeyType($key);
    }

    /**
     * @param mixed $firstValue
     * @param mixed $secondValue
     */
    public function callIsSameValues($firstValue, $secondValue): bool
    {
        return $this->isSameValues($firstValue, $secondValue);
    }

    public function callAssertIsNotReadOnly(): self
    {
        return $this->assertIsNotReadOnly();
    }

    protected function assertValueType($value): AbstractCollection
    {
        return $this;
    }
}
