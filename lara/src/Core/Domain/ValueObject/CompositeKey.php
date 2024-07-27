<?php

declare(strict_types=1);

namespace App\Core\Domain\ValueObject;

use Thiagoprz\CompositeKey\HasCompositeKey;

/**
 * @author Dmitry S
 */
abstract class CompositeKey extends ValueObject
{
    use HasCompositeKey;

    public function __construct(
        private readonly string $keyName,
        private readonly string $value,
    )
    {
        parent::__construct($this->value);
    }

    /**
     * @return string
     */
    public function getKeyName(): string
    {
        return $this->keyName;
    }

    public function generate(): static
    {
        return new static($this->getKeyName(), $this->getValue());
    }

    protected function validate(): bool
    {
        return is_array($this->getValue());
    }
}
