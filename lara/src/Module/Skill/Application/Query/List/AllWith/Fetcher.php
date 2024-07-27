<?php

declare(strict_types=1);

namespace App\Module\Skill\Application\Query\List\AllWith;

use App\Core\Application\Query\FetcherInterface;
use App\Module\Skill\Domain\Entity\Skill;
use Illuminate\Database\Eloquent\Collection;

/**
 * @author Yiimar
 */
class Fetcher implements FetcherInterface
{
    public function fetch(): Collection
    {
        return Skill::with(Skill::RELATION_USERS)->get();
    }
}
