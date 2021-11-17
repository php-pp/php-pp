<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\StringCollectionInterface
};
use PhpPp\Core\Component\Collection\StringCollection;

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return StringCollection::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return [
            \Traversable::class,
            \Iterator::class,
            \Countable::class,
            CollectionInterface::class,
            ToArrayInterface::class,
            StringCollectionInterface::class
        ];
    }
}
