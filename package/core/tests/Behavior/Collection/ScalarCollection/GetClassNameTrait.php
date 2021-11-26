<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection;

use PhpPp\Core\Component\Collection\ScalarCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return ScalarCollection::class;
    }
}
