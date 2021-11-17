<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Tests\Unit\Collection;

use PhpPp\Core\Component\Collection\AbstractScalarCollection;

class TestScalarCollection extends AbstractScalarCollection
{
    /** @return static */
    public function setAllowString(bool $allow = true): self
    {
        $this->allowString = $allow;

        return $this;
    }

    /** @return static */
    public function setAllowInteger(bool $allow = true): self
    {
        $this->allowInteger = $allow;

        return $this;
    }

    /** @return static */
    public function setAllowFloat(bool $allow = true): self
    {
        $this->allowFloat = $allow;

        return $this;
    }

    /** @return mixed */
    public function current()
    {
        return $this->doCurrent();
    }

    /**
     * @param string|int $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->doGet($key);
    }

    /** @return array<string|int, mixed> */
    public function toArray(): array
    {
        return $this->values;
    }

    /** @param mixed $value */
    public function callAssertValueType($value): self
    {
        return $this->assertValueType($value);
    }
}
