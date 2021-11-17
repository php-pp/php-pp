<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Exception\Collection\InvalidPreserveKeysException;

use PhpBehavior\BehaviorTestCase\AbstractExceptionBehaviorTestCase;
use PhpPp\Core\Component\Exception\Collection\InvalidPreserveKeysException;
use PhpPp\Core\Contract\{
    Exception\Collection\CollectionExceptionInterface,
    Exception\Collection\InvalidPreserveKeysExceptionInterface
};

/** @coversNothing */
final class ExceptionBehaviorTest extends AbstractExceptionBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return InvalidPreserveKeysException::class;
    }

    protected static function getExpectedInterfaces(): array
    {
        return array_merge(
            parent::getExpectedInterfaces(),
            [
                CollectionExceptionInterface::class,
                InvalidPreserveKeysExceptionInterface::class
            ]
        );
    }
}
