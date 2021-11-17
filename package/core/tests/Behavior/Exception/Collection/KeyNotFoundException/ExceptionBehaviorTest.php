<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Exception\Collection\KeyNotFoundException;

use PhpBehavior\BehaviorTestCase\AbstractExceptionBehaviorTestCase;
use PhpPp\Core\Component\Exception\Collection\KeyNotFoundException;
use PhpPp\Core\Contract\{
    Exception\Collection\CollectionExceptionInterface,
    Exception\Collection\KeyNotFoundExceptionInterface
};

/** @coversNothing */
final class ExceptionBehaviorTest extends AbstractExceptionBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return KeyNotFoundException::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return array_merge(
            parent::getExpectedInterfaces(),
            [
                CollectionExceptionInterface::class,
                KeyNotFoundExceptionInterface::class
            ]
        );
    }
}
