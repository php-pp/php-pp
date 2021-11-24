<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\IntegerNullableCollection;

use PhpPp\Core\Component\Collection\IntegerNullableCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return IntegerNullableCollection::class;
    }
}
