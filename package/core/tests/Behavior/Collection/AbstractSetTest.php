<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;

abstract class AbstractSetTest extends AbstractMethodBehaviorTestCase
{
    protected static function getMethodName(): string
    {
        return 'set';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doSet($key, $value);');
    }
}
