<?php

declare(strict_types=1);

namespace App\Core\Domain\Entity\SingleTable\Exception;

/**
 * @author Yiimar
 */
class SingleTableInheritanceInvalidAttributesException extends SingleTableInheritanceException
{
    public function __construct(
        $message,
        protected array $invalidAttributes
    ) {
        $parentMessage = sprintf('%s The attributes: %s are invalid.',
            $message,
            implode(',', $invalidAttributes)
        );

        parent::__construct($parentMessage);
    }

    public function getInvalidAttributes(): array
    {
        return $this->invalidAttributes;
    }
}
