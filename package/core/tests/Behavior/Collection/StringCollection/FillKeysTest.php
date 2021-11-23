<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection\StringCollection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;
use PhpPp\Core\Component\Collection\StringCollection;

/** @coversNothing */
final class FillKeysTest extends AbstractMethodBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return StringCollection::class;
    }

    protected static function getMethodName(): string
    {
        return 'fillKeys';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doFillKeys($keys, $value);');
    }
}
