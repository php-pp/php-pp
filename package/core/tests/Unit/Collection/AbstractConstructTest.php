<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PhpPp\Core\Component\Exception\Collection\InvalidValueTypeException;
use PhpPp\Core\Contract\Collection\CollectionInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractConstructTest extends TestCase
{
    /**
     * @param array<string|int, mixed> $values
     * @return CollectionInterface<mixed>
     */
    abstract protected function createCollection(array $values): CollectionInterface;

    abstract protected function getExceptionMessage(): string;

    public function testString(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection(['foo']);
    }

    public function testInteger(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection([1]);
    }

    public function testFloat(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection([1.1]);
    }

    public function testTrue(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection([true]);
    }

    public function testFalse(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection([false]);
    }

    public function testStdClass(): void
    {
        $this->expectException(InvalidValueTypeException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage($this->getExceptionMessage());

        $this->createCollection([new \stdClass()]);
    }

    public function testNull(): void
    {
        if ($this->isAllowNull()) {
            $collection = $this->createCollection([null]);

            static::assertNull($collection->toArray()[0]);
        } else {
            $this->expectException(InvalidValueTypeException::class);
            $this->expectExceptionCode(0);
            $this->expectExceptionMessage($this->getExceptionMessage());

            $this->createCollection([null]);
        }
    }

    protected function isAllowNull(): bool
    {
        return false;
    }
}
