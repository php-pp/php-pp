<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Behavior\Collection;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;

abstract class AbstractFillTest extends AbstractMethodBehaviorTestCase
{
    protected static function getMethodName(): string
    {
        return 'fill';
    }

    public function testCode(): void
    {
        static::assertCode('        return $this->doFill($value, $count, $startIndex);');
    }
}
