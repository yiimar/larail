<?php

declare(strict_types=1);

namespace App\Domain\User\Domain\Exception;

use App\Domain\Common\Domain\Exception\DomainException;

/**
 * @author Yiimar
 */
class UserNotLoad extends DomainException
{
    /**
     * @param array<string, string|int|float|bool|null> $details
     */
    public function __construct(string $name, array $details = [])
    {
        parent::__construct("$name Not Found", $details);
    }

}
