<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ScalarNullableCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\ScalarNullableCollectionInterface,
    Collection\NullableInterface
};
use PhpPp\Core\Component\Collection\ScalarNullableCollection;

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return ScalarNullableCollection::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return [
            \Traversable::class,
            \Iterator::class,
            \Countable::class,
            CollectionInterface::class,
            NullableInterface::class,
            ToArrayInterface::class,
            ScalarNullableCollectionInterface::class
        ];
    }
}
