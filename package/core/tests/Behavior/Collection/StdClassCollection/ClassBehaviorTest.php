<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StdClassCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Component\Collection\StdClassCollection;
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\CommonObjectCollectionInterface,
    Collection\StdClassCollectionInterface
};

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return StdClassCollection::class;
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
            StdClassCollectionInterface::class
        ];
    }
}
