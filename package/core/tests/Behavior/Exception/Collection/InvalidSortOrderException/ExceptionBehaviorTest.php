<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Exception\Collection\InvalidSortOrderException;

use PhpBehavior\BehaviorTestCase\AbstractExceptionBehaviorTestCase;
use PhpPp\Core\Component\Exception\Collection\InvalidSortOrderException;
use PhpPp\Core\Contract\{
    Exception\Collection\CollectionExceptionInterface,
    Exception\Collection\InvalidSortOrderExceptionInterface
};

/** @coversNothing */
final class ExceptionBehaviorTest extends AbstractExceptionBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return InvalidSortOrderException::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return array_merge(
            parent::getExpectedInterfaces(),
            [
                CollectionExceptionInterface::class,
                InvalidSortOrderExceptionInterface::class
            ]
        );
    }
}
