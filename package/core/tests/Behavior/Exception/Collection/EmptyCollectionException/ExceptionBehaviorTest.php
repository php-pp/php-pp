<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Exception\Collection\EmptyCollectionException;

use PhpBehavior\BehaviorTestCase\AbstractExceptionBehaviorTestCase;
use PhpPp\Core\Component\Exception\Collection\EmptyCollectionException;
use PhpPp\Core\Contract\{
    Exception\Collection\CollectionExceptionInterface,
    Exception\Collection\EmptyCollectionExceptionInterface
};

/** @coversNothing */
final class ExceptionBehaviorTest extends AbstractExceptionBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return EmptyCollectionException::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return array_merge(
            parent::getExpectedInterfaces(),
            [
                CollectionExceptionInterface::class,
                EmptyCollectionExceptionInterface::class
            ]
        );
    }
}
