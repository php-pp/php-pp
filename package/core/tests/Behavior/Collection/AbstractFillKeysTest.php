<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;

abstract class AbstractFillKeysTest extends AbstractMethodBehaviorTestCase
{
    protected static function getMethodName(): string
    {
        return 'fillKeys';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doFillKeys($keys, $value);');
    }
}
