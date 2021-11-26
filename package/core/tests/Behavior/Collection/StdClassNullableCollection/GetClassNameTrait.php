<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection;

use PhpPp\Core\Component\Collection\StdClassNullableCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return StdClassNullableCollection::class;
    }
}
