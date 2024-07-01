<?php

declare(strict_types=1);

namespace App\Domain\User\Application\Query\List;

/**
 * @author Yiimar
 */
class Command
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $email_verified_at,
        public string $created_at,
        public string $updated_at,
        public array $skills,
    ) {}
}
