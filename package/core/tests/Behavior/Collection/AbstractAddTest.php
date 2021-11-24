<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;

abstract class AbstractAddTest extends AbstractMethodBehaviorTestCase
{
    protected static function getMethodName(): string
    {
        return 'add';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doAdd($value);');
    }
}
