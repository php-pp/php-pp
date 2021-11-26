<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection;

use PhpPp\Core\Component\Collection\DateTimeNullableCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return DateTimeNullableCollection::class;
    }
}
