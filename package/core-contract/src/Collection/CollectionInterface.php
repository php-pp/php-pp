<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

use PhpPp\Core\Contract\Array_\ToArrayInterface;

interface CollectionInterface extends ToArrayInterface, \Iterator, \Countable
{
    public const VALUE_ALREADY_EXISTS_ADD = 1;
    public const VALUE_ALREADY_EXISTS_DO_NOT_ADD = 2;
    public const VALUE_ALREADY_EXISTS_EXCEPTION = 3;

    public const ORDER_ASCENDING = 1;
    public const ORDER_DESCENDING = 2;

    public const MERGE_DO_NOT_PRESERVE_KEYS = 1;
    public const MERGE_PRESERVE_ASSOCIATIVE_KEYS = 2;
    public const MERGE_PRESERVE_ALL_KEYS = 3;

    /** @return static<mixed> */
    public function setReadOnly(bool $readOnly): self;

    public function isReadOnly(): bool;

    // -----------------------------------------------------------------------------------------------------------------
    // Access or edit keys

    /** @return static<mixed> */
    public function resetKeys(): self;

    /** @return static<mixed> */
    public function changeKeyCase(int $case = CASE_LOWER): self;

    /** @param string|int $key */
    public function hasKey($key): bool;

    public function getKeys(): ScalarCollectionInterface;

    public function getIntegerKeys(): IntegerCollectionInterface;

    public function getStringKeys(): StringCollectionInterface;

    /** @return string|int */
    public function getFirstKey();

    /** @return string|int */
    public function getLastKey();

    // -----------------------------------------------------------------------------------------------------------------
    // Access or edit values

    /** @return static<mixed> */
    public function setValueAlreadyExistsMode(int $valueAlreadyExistsMode): self;

    public function getValueAlreadyExistsMode(): int;

    /**
     * @param iterable<string|int, mixed> $values
     * @return static<mixed>
     */
    public function replace(iterable $values): self;

    /**
     * @param string|int $key
     * @return static<mixed>
     */
    public function remove($key): self;

    // -----------------------------------------------------------------------------------------------------------------
    // Access or edit keys and values

    /** @return static<mixed> */
    public function clear(): self;

    /**
     * @param iterable<string|int, mixed> $iterable
     * @return static<mixed>
     */
    public function merge(iterable $iterable, int $preserveKeys = self::MERGE_DO_NOT_PRESERVE_KEYS): self;

    /** @return static<mixed> */
    public function shuffle(): self;

    /** @return static<mixed> */
    public function filter(callable $callback, int $mode = 0): self;

    // -----------------------------------------------------------------------------------------------------------------
    // Access or edit internal pointer

    /** @return static<mixed> */
    public function previous(): self;

    /** @return static<mixed> */
    public function end(): self;

    // -----------------------------------------------------------------------------------------------------------------
    // Sort

    /** @return static<mixed> */
    public function sort(
        int $order = self::ORDER_ASCENDING,
        bool $preserveKeys = false,
        int $flags = SORT_REGULAR
    ): self;
}
