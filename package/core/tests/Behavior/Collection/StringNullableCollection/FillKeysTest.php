<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StringNullableCollection;

use PhpPp\Core\Component\{
    Collection\StringNullableCollection,
    Tests\Behavior\Collection\AbstractFillKeysTest
};

/** @coversNothing */
final class FillKeysTest extends AbstractFillKeysTest
{
    protected static function getClassName(): string
    {
        return StringNullableCollection::class;
    }
}
