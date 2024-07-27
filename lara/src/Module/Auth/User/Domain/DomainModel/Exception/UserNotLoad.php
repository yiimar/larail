<?php

declare(strict_types=1);

namespace App\Module\Auth\User\Domain\DomainModel\Exception;


use App\Core\Domain\Exception\DomainException;

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
