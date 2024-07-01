<?php

declare(strict_types=1);

namespace App\Domain\User\Application\Query\List;

use App\Domain\Common\Application\Query\BaseFetcher;
use App\Domain\Skill\Domain\Entity\Skill;
use App\Domain\User\Domain\Entity\User;

/**
 * @author Yiimar
 */
class Fetcher implements BaseFetcher
{
    public function fetch(): array
    {
        $users = User::with(User::RELATION_SKILLS)->get()->toArray();

        $result = [];
        foreach ($users as $user) {
            $skills = $this->makeSkills($user[User::RELATION_SKILLS]);
            $item = new Command(
                $user[User::ATTR_ID],
                $user[User::ATTR_NAME],
                $user[User::ATTR_EMAIL],
                $user[User::ATTR_EMAIL_VERIFIED_AT],
                $user[User::ATTR_CREATED_AT],
                $user[User::ATTR_UPDATED_AT],
                $skills,
            );
            $result[] = $item;
        }
        return $result;
    }

    private function makeSkills(array $source): array
    {
        $skills = [];
        foreach ($source as $item) {
            $skills[] = $item[Skill::ATTR_NAME];
        }
        return $skills;
    }
}
