<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection;

use PhpPp\Core\Component\Collection\StdClassCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return StdClassCollection::class;
    }
}
