<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;

abstract class AbstractCurrentTest extends AbstractMethodBehaviorTestCase
{
    protected static function getMethodName(): string
    {
        return 'current';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doCurrent();');
    }
}
