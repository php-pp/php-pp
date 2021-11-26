<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\FloatCollection;

use PhpPp\Core\Component\Collection\FloatCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return FloatCollection::class;
    }
}
