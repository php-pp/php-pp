<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection;

use PhpPp\Core\Component\Collection\StringCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return StringCollection::class;
    }
}
