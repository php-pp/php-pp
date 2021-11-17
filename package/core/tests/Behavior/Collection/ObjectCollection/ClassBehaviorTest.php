<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ObjectCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Component\Collection\ObjectCollection;
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\CommonObjectCollectionInterface,
    Collection\ObjectCollectionInterface
};

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return ObjectCollection::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return [
            \Traversable::class,
            \Iterator::class,
            \Countable::class,
            CollectionInterface::class,
            ToArrayInterface::class,
            CommonObjectCollectionInterface::class,
            ObjectCollectionInterface::class
        ];
    }
}
