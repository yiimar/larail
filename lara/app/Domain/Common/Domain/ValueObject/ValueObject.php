<?php

declare(strict_types=1);

namespace App\Domain\Common\Domain\ValueObject;

use Illuminate\Testing\Assert;

/**
 * @author Yiimar
 */
abstract class ValueObject
{
    public function __construct(private $value)
    {
        Assert::assertTrue($this->validate());
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    public function equals(object $object): bool
    {
        Assert::assertTrue(is_subclass_of($object, static::class));
        return $this->getValue() === $object->getValue();
    }

    abstract public function generate(): static;

    abstract protected function validate(): bool;
}
