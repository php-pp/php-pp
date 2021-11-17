<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;

/** @coversNothing */
final class DoubleForeachTest extends TestCase
{
    public function testDoubleForeach(): void
    {
        $collection = new TestCollection([1, 2, 3]);

        $results = [];
        foreach ($collection as $value1) {
            foreach ($collection as $value2) {
                $results[] = $value2;
            }
        }

        // Expected $results: [1, 2, 3, 1, 2, 3, 1, 2, 3]
        // Real $results: [1, 2, 3]
        // There is only one pointer for Collection::$values so the second foreach moves it for first and second foreach
        static::assertSame([1, 2, 3], $results);
    }
}
