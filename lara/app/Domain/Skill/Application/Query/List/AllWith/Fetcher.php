<?php

declare(strict_types=1);

namespace App\Domain\Skill\Application\Query\List\AllWith;

use App\Domain\Common\Application\Query\BaseFetcher;
use App\Domain\Skill\Domain\Entity\Skill;
use Illuminate\Database\Eloquent\Collection;

/**
 * @author Yiimar
 */
class Fetcher implements BaseFetcher
{
    public function fetch(): Collection
    {
        return Skill::with(Skill::RELATION_USERS)->get();
    }
}
