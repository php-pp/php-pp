<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection;

use PhpPp\Core\Component\Collection\ScalarNullableCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return ScalarNullableCollection::class;
    }
}
