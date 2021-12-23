<?php

declare(strict_types=1);

namespace PhpPp\Core\Component\Collection;

use PhpPp\Core\Component\{
    Exception\Collection\CollectionException,
    Exception\Collection\InvalidValueTypeException
};
use PhpPp\Core\Contract\{
    Collection\CommonObjectCollectionInterface,
    Collection\NullableInterface
};

abstract class AbstractObjectCollection extends AbstractCollection
{
    abstract protected function getInstanceOf(): ?string;

    protected int $comparisonMode = CommonObjectCollectionInterface::COMPARISON_OBJECT_HASH;

    public function getComparisonMode(): int
    {
        return $this->comparisonMode;
    }

    /** @return static<mixed> */
    protected function doSetComparisonMode(int $mode): self
    {
        $this->comparisonMode = $mode;

        return $this;
    }

    /**
     * @param mixed $firstValue
     * @param mixed $secondValue
     */
    protected function isSameValues($firstValue, $secondValue): bool
    {
        if ($this->getComparisonMode() === CommonObjectCollectionInterface::COMPARISON_OBJECT_HASH) {
            $return = parent::isSameValues(
                is_object($firstValue) ? spl_object_hash($firstValue) : null,
                is_object($secondValue) ? spl_object_hash($secondValue) : null
            );
        } elseif ($this->getComparisonMode() === CommonObjectCollectionInterface::COMPARISON_EQUALS) {
            // Yes it's really a == and not === to compare properties or __toString() and not object hash
            $return = $firstValue == $secondValue;
        } elseif ($this->getComparisonMode() === CommonObjectCollectionInterface::COMPARISON_STRING) {
            $return = parent::isSameValues(
                $this->castValueToString($firstValue),
                $this->castValueToString($secondValue)
            );
        } else {
            throw new CollectionException('Unknown comparison mode "' . $this->getComparisonMode() . '".');
        }

        return $return;
    }

    /** @param mixed $value */
    protected function castValueToString($value): string
    {
        try {
            $return = parent::castValueToString($value);
        } catch (\Throwable $exception) {
            if (is_object($value) === false) {
                throw InvalidValueTypeException::createFromAllowedTypes(new StringCollection(['object']));
            }
            $return = spl_object_hash($value);
        }

        return $return;
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

        $instanceOf = $this->getInstanceOf();
        if (
            is_object($value) === false
            || (
                is_string($instanceOf)
                && $value instanceof $instanceOf === false
            )
        ) {
            $message = 'Value should be ' . (is_string($instanceOf) ? 'instance of ' . $instanceOf : 'of type object');
            if ($this instanceof NullableInterface) {
                $message .= ' or null';
            }
            $message .= '.';

            throw new InvalidValueTypeException($message);
        }

        return $this;
    }
}
