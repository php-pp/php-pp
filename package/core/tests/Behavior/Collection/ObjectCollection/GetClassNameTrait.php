<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection;

use PhpPp\Core\Component\Collection\ObjectCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return ObjectCollection::class;
    }
}
