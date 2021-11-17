<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\DateTimeNullableCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Component\Collection\DateTimeNullableCollection;
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\CommonObjectCollectionInterface,
    Collection\DateTimeNullableCollectionInterface,
    Collection\NullableInterface
};

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return DateTimeNullableCollection::class;
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
            CommonObjectCollectionInterface::class,
            DateTimeNullableCollectionInterface::class
        ];
    }
}
