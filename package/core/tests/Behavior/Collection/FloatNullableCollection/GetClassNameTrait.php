<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\FloatNullableCollection;

use PhpPp\Core\Component\Collection\FloatNullableCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return FloatNullableCollection::class;
    }
}
