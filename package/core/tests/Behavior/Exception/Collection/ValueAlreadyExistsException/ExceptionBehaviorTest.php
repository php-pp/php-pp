<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Exception\Collection\ValueAlreadyExistsException;

use PhpBehavior\BehaviorTestCase\AbstractExceptionBehaviorTestCase;
use PhpPp\Core\Component\Exception\Collection\ValueAlreadyExistsException;
use PhpPp\Core\Contract\{
    Exception\Collection\CollectionExceptionInterface,
    Exception\Collection\ValueAlreadyExistsExceptionInterface
};

/** @coversNothing */
final class ExceptionBehaviorTest extends AbstractExceptionBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return ValueAlreadyExistsException::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return array_merge(
            parent::getExpectedInterfaces(),
            [
                CollectionExceptionInterface::class,
                ValueAlreadyExistsExceptionInterface::class
            ]
        );
    }
}
