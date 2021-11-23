<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;
use PhpPp\Core\Component\Collection\StringCollection;

/** @coversNothing */
final class HasTest extends AbstractMethodBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return StringCollection::class;
    }

    protected static function getMethodName(): string
    {
        return 'has';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doHas($value);');
    }
}
