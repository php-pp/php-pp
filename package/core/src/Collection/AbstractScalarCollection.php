<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Component\Exception\Collection\InvalidValueTypeException;
use PhpPp\Core\Contract\Collection\NullableInterface;

abstract class AbstractScalarCollection extends AbstractCollection
{
    protected bool $allowString = true;

    protected bool $allowInteger = true;

    protected bool $allowFloat = true;

    public function isAllowString(): bool
    {
        return $this->allowString;
    }

    public function isAllowInteger(): bool
    {
        return $this->allowInteger;
    }

    public function isAllowFloat(): bool
    {
        return $this->allowFloat;
    }

    /**
     * @param string|int $key
     * @param mixed $value
     * @return static<mixed>
     */
    protected function doSet($key, $value): self
    {
        $this->assertValueType($value);

        return parent::doSet($key, $value);
    }

    /**
     * @param mixed $value
     * @return static<mixed>
     */
    protected function doAdd($value): self
    {
        $this->assertValueType($value);

        return parent::doAdd($value);
    }

    /**
     * @param mixed $value
     * @return static<mixed>
     */
    protected function assertValueType($value): self
    {
        if ($this instanceof NullableInterface && is_null($value)) {
            return $this;
        }

        if (is_scalar($value) === false || is_bool($value)) {
            $types = new StringCollection(['string', 'integer', 'float']);
            if ($this instanceof NullableInterface) {
                $types->add('null');
            }
            throw InvalidValueTypeException::createFromAllowedTypes($types);
        }

        if ($this->isAllowString() === false && is_string($value)) {
            throw new InvalidValueTypeException('Type string is not allowed by configuration.');
        }

        if ($this->isAllowInteger() === false && is_int($value)) {
            throw new InvalidValueTypeException('Type integer is not allowed by configuration.');
        }

        if ($this->isAllowFloat() === false && is_float($value)) {
            throw new InvalidValueTypeException('Type float is not allowed by configuration.');
        }

        return $this;
    }
}
