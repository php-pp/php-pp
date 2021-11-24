<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\IntegerCollection;

use PhpPp\Core\Component\Collection\IntegerCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return IntegerCollection::class;
    }
}
