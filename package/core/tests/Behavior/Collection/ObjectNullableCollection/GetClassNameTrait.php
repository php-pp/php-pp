<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ObjectNullableCollection;

use PhpPp\Core\Component\Collection\ObjectNullableCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return ObjectNullableCollection::class;
    }
}
