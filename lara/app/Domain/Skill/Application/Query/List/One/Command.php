<?php

declare(strict_types=1);

namespace App\Domain\Skill\Application\Query\List\One;

/**
 * @author Yiimar
 */
class Command
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}
