<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection\AbstractCollection;

use PhpPp\Core\Component\{
    Tests\Unit\Collection\TestCollection,
    Tests\Unit\Collection\TestToString
};
use PHPUnit\Framework\TestCase;

/** @covers \PhpPp\Core\Component\Collection\AbstractCollection::castValueToString */
final class CastValueToStringTest extends TestCase
{
    public function testString(): void
    {
        static::assertSame('foo', (new TestCollection())->callCastValueToString('foo'));
    }

    public function testInteger(): void
    {
        static::assertSame('42', (new TestCollection())->callCastValueToString(42));
    }

    public function testFloat(): void
    {
        static::assertSame('42.9', (new TestCollection())->callCastValueToString(42.9));
    }

    public function testArray(): void
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<')) {
            $this->expectNotice();
            $this->expectNoticeMessage('Array to string conversion');
        } else {
            $this->expectWarning();
            $this->expectWarningMessage('Array to string conversion');
        }

        (new TestCollection())->callCastValueToString([]);
    }

    public function testObject(): void
    {
        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Object of class stdClass could not be converted to string');
        $this->expectExceptionCode(0);
        (new TestCollection())->callCastValueToString(new \stdClass());
    }

    public function testObjectToString(): void
    {
        static::assertSame('foo', (new TestCollection())->callCastValueToString(new TestToString()));
    }

    public function testNull(): void
    {
        static::assertSame('NULL', (new TestCollection())->callCastValueToString(null));
    }
}
