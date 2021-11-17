<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StdClassNullableCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\CommonObjectCollectionInterface,
    Collection\StdClassNullableCollectionInterface,
    Collection\NullableInterface
};
use PhpPp\Core\Component\Collection\StdClassNullableCollection;

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return StdClassNullableCollection::class;
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
            StdClassNullableCollectionInterface::class
        ];
    }
}
