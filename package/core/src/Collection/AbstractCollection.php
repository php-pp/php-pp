<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Component\{
    Exception\Collection\CollectionException,
    Exception\Collection\EmptyCollectionException,
    Exception\Collection\InvalidCountException,
    Exception\Collection\InvalidKeyTypeException,
    Exception\Collection\InvalidPreserveKeysException,
    Exception\Collection\InvalidSortOrderException,
    Exception\Collection\KeyNotFoundException,
    Exception\Collection\OutOfBoundsException,
    Exception\Collection\ReadOnlyException,
    Exception\Collection\ValueAlreadyExistsException,
    Iterable\IterableUtils
};
use PhpPp\Core\Contract\{
    Collection\CollectionInterface,
    Collection\IntegerCollectionInterface,
    Collection\ScalarCollectionInterface,
    Collection\StringCollectionInterface
};

abstract class AbstractCollection implements CollectionInterface
{
    /** @var array<string|int, mixed> */
    protected array $values = [];

    protected bool $valid = false;

    protected bool $readOnly = false;

    protected int $valueAlreadyExistsMode = CollectionInterface::VALUE_ALREADY_EXISTS_ADD;

    /** @param iterable<mixed> $values */
    public function __construct(iterable $values = [])
    {
        $this->replace($values);
    }

    /** @return static<mixed> */
    public function setReadOnly(bool $readOnly = true): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        $this->readOnly = $readOnly;

        return $this;
    }

    public function isReadOnly(): bool
    {
        return $this->readOnly;
    }

    /** @return static<mixed> */
    public function setValueAlreadyExistsMode(int $valueAlreadyExistsMode): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        $this->valueAlreadyExistsMode = $valueAlreadyExistsMode;

        return $this;
    }

    public function getValueAlreadyExistsMode(): int
    {
        return $this->valueAlreadyExistsMode;
    }

    /** @return string|int */
    public function getFirstKey()
    {
        $return = array_key_first($this->values);
        if (is_string($return) === false && is_int($return) === false) {
            throw new EmptyCollectionException();
        }

        return $return;
    }

    /** @param string|int $key */
    public function hasKey($key): bool
    {
        $this->assertKeyType($key);

        return array_key_exists($key, $this->values);
    }

    public function getKeys(): ScalarCollectionInterface
    {
        $return = (new ScalarCollection())
            ->setAllowFloat(false);

        // We can't use replace() return: it's CollectionInterface
        return $return
            ->replace(array_keys($this->values))
            ->setReadOnly();
    }

    public function getIntegerKeys(): IntegerCollectionInterface
    {
        $return = new IntegerCollection();
        foreach ($this->getKeys() as $key) {
            if (is_int($key)) {
                $return->add($key);
            }
        }

        return $return->setReadOnly();
    }

    public function getStringKeys(): StringCollectionInterface
    {
        $return = new StringCollection();
        foreach ($this->getKeys() as $key) {
            if (is_string($key)) {
                $return->add($key);
            }
        }

        return $return->setReadOnly();
    }

    /** @return string|int */
    public function getLastKey()
    {
        $return = array_key_last($this->values);
        if (is_string($return) === false && is_int($return) === false) {
            throw new EmptyCollectionException();
        }

        return $return;
    }

    /** @return static<mixed> */
    public function changeKeyCase(int $case = CASE_LOWER): CollectionInterface
    {
        return $this
            ->assertIsNotReadOnly()
            ->replace(array_change_key_case($this->values, $case));
    }

    /** @return static<mixed> */
    public function resetKeys(): CollectionInterface
    {
        return $this
            ->assertIsNotReadOnly()
            ->replace(array_values($this->values));
    }

    /**
     * @param iterable<mixed> $values
     * @return static<mixed>
     */
    public function replace(iterable $values): CollectionInterface
    {
        $this
            ->assertIsNotReadOnly()
            ->clear();

        foreach (IterableUtils::toArray($values) as $key => $value) {
            $this->doSet($key, $value);
        }

        $this->rewind();

        return $this;
    }

    /** @return static<mixed> */
    public function filter(callable $callback, int $mode = 0): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        $this->values = array_filter($this->values, $callback, $mode);

        return $this;
    }

    /**
     * @param iterable<mixed> $iterable
     * @return static<mixed>
     */
    public function merge(
        iterable $iterable,
        int $preserveKeys = self::MERGE_DO_NOT_PRESERVE_KEYS
    ): CollectionInterface {
        $this->assertIsNotReadOnly();

        if ($preserveKeys === static::MERGE_PRESERVE_ALL_KEYS) {
            $this->replace(
                array_replace($this->values, IterableUtils::toArray($iterable))
            );
        } elseif ($preserveKeys === static::MERGE_PRESERVE_ASSOCIATIVE_KEYS) {
            $this->replace(
                array_merge($this->values, IterableUtils::toArray($iterable))
            );
        } elseif ($preserveKeys === static::MERGE_DO_NOT_PRESERVE_KEYS) {
            $this->replace(
                array_merge(
                    array_values($this->values),
                    array_values(IterableUtils::toArray($iterable))
                )
            );
        } else {
            throw new InvalidPreserveKeysException($preserveKeys);
        }

        return $this;
    }

    /** @return static<mixed> */
    public function shuffle(): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        if (shuffle($this->values) === false) {
            // I've not found a way to make shuffle() return false
            // @codeCoverageIgnoreStart
            throw new CollectionException('Unkown error while shuffling values.');
            // @codeCoverageIgnoreEnd
        }

        return $this;
    }

    /** @return static<mixed> */
    public function sort(
        int $order = self::ORDER_ASCENDING,
        bool $preserveKeys = false,
        int $flags = SORT_REGULAR
    ): CollectionInterface {
        $this->assertIsNotReadOnly();

        if ($order === static::ORDER_ASCENDING) {
            if ($preserveKeys) {
                asort($this->values, $flags);
            } else {
                sort($this->values, $flags);
            }
        } elseif ($order === static::ORDER_DESCENDING) {
            if ($preserveKeys) {
                arsort($this->values, $flags);
            } else {
                rsort($this->values, $flags);
            }
        } else {
            throw new InvalidSortOrderException($order);
        }

        return $this;
    }

    public function count(): int
    {
        return count($this->values);
    }

    /**
     * @param string|int $key
     * @return static<mixed>
     */
    public function remove($key): CollectionInterface
    {
        $this
            ->assertIsNotReadOnly()
            ->assertKeyType($key);

        if ($this->hasKey($key) === false) {
            throw new KeyNotFoundException($key);
        }

        unset($this->values[$key]);

        return $this->refreshValid();
    }

    /** @return static<mixed> */
    public function clear(): CollectionInterface
    {
        $this->assertIsNotReadOnly();
        $this->values = [];

        return $this->refreshValid();
    }

    /** @return string|int|null */
    public function key()
    {
        return key($this->values);
    }

    public function valid(): bool
    {
        return $this->valid;
    }

    /** @return static<mixed> */
    public function previous(): CollectionInterface
    {
        if (prev($this->values) === false) {
            throw new OutOfBoundsException();
        }

        return $this;
    }

    public function next(): void
    {
        $this->valid = next($this->values) !== false;
    }

    public function rewind(): void
    {
        reset($this->values);
        $this->refreshValid();
    }

    /** @return static<mixed> */
    public function end(): CollectionInterface
    {
        end($this->values);

        return $this;
    }

    /**
     * @param mixed $value
     * @return static<mixed>
     */
    protected function doAdd($value): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        if ($this->canAddValue($value)) {
            $this->values[] = $value;
        }

        return $this->refreshValid();
    }

    /**
     * @param string|int $key
     * @param mixed $value
     * @return static<mixed>
     */
    protected function doSet($key, $value): CollectionInterface
    {
        $this
            ->assertIsNotReadOnly()
            ->assertKeyType($key);

        if ($this->canAddValue($value)) {
            $this->values[$key] = $value;
        }

        return $this->refreshValid();
    }

    /**
     * @param mixed $value
     * @return static<mixed>
     */
    protected function doFill($value, int $count, int $startIndex = 0): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        if ($count < 0) {
            throw InvalidCountException::createShouldBePositiveOr0($count);
        }

        return $this->replace(array_fill($startIndex, $count, $value));
    }

    /**
     * @param iterable<string|int, mixed> $keys
     * @param mixed $value
     * @return static<mixed>
     */
    protected function doFillKeys(iterable $keys, $value): CollectionInterface
    {
        $this->assertIsNotReadOnly();

        return $this->replace(array_fill_keys(IterableUtils::toArray($keys), $value));
    }

    /** @param mixed $value */
    protected function doHas($value): bool
    {
        return in_array($value, $this->values, true);
    }

    /**
     * @param string|int $key
     * @return mixed
     */
    protected function doGet($key)
    {
        $this->assertKeyType($key);

        if ($this->hasKey($key) === false) {
            throw new KeyNotFoundException($key);
        }

        return $this->values[$key];
    }

    /** @return mixed */
    protected function doCurrent()
    {
        return current($this->values);
    }

    /** @return static<mixed> */
    protected function refreshValid(): self
    {
        $this->valid = $this->count() > 0;

        return $this;
    }

    /**
     * @param mixed $key
     * @return static<mixed>
     */
    protected function assertKeyType($key): self
    {
        if (is_string($key) === false && is_int($key) === false) {
            throw InvalidKeyTypeException::createFromAllowedTypes(
                new StringCollection(['string', 'integer'])
            );
        }

        return $this;
    }

    /**
     * @param mixed $firstValue
     * @param mixed $secondValue
     */
    protected function isSameValues($firstValue, $secondValue): bool
    {
        return $firstValue === $secondValue;
    }

    /** @param mixed $value */
    protected function castValueToString($value): string
    {
        return is_null($value) ? 'NULL' : (string) $value;
    }

    /** @param mixed $value */
    protected function canAddValue($value): bool
    {
        $return = true;

        if (
            in_array(
                $this->getValueAlreadyExistsMode(),
                [static::VALUE_ALREADY_EXISTS_DO_NOT_ADD, static::VALUE_ALREADY_EXISTS_EXCEPTION],
                true
            )
        ) {
            foreach ($this->values as $internalValue) {
                if ($this->isSameValues($value, $internalValue)) {
                    if ($this->getValueAlreadyExistsMode() === static::VALUE_ALREADY_EXISTS_EXCEPTION) {
                        throw new ValueAlreadyExistsException($this->castValueToString($value));
                    }

                    $return = false;
                    break;
                }
            }
        }

        return $return;
    }

    /** @return static<mixed> */
    protected function assertIsNotReadOnly(): self
    {
        if ($this->isReadOnly()) {
            throw new ReadOnlyException();
        }

        return $this;
    }
}
