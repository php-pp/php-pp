<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeCollection;

use PhpPp\Core\Component\Collection\DateTimeCollection;

trait GetClassNameTrait
{
    protected static function getClassName(): string
    {
        return DateTimeCollection::class;
    }
}
