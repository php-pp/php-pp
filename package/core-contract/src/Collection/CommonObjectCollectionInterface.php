<?php

declare(strict_types=1);

namespace PhpPp\Core\Contract\Collection;

interface CommonObjectCollectionInterface extends CollectionInterface
{
    public const COMPARISON_OBJECT_HASH = 1;
    public const COMPARISON_EQUALS = 2;
    public const COMPARISON_STRING = 3;

    /** @return static<mixed> */
    public function setComparisonMode(int $mode): self;

    public function getComparisonMode(): int;
}
