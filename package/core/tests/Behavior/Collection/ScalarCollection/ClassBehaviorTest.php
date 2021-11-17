<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\ScalarCollection;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    BehaviorTestCase\ClassImplementTrait
};
use PhpPp\Core\Contract\{
    Array_\ToArrayInterface,
    Collection\CollectionInterface,
    Collection\ScalarCollectionInterface
};
use PhpPp\Core\Component\Collection\ScalarCollection;

/** @coversNothing */
final class ClassBehaviorTest extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

    protected static function getClassName(): string
    {
        return ScalarCollection::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return [
            \Traversable::class,
            \Iterator::class,
            \Countable::class,
            CollectionInterface::class,
            ToArrayInterface::class,
            ScalarCollectionInterface::class
        ];
    }
}
