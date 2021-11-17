<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

trait CountValuesTrait
{
    public function countValues(): IntegerCollection
    {
        /** For performance purpose we use $this->values */
        return (new IntegerCollection(array_count_values($this->values)))
            ->setReadOnly();
    }
}
