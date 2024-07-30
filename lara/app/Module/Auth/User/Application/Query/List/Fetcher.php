<?php

declare(strict_types=1);

namespace App\Module\Auth\User\Application\Query\List;

use App\Core\Application\Query\FetcherInterface;
use App\Module\Auth\User\Domain\DomainModel\Entity\User\User;
use App\Module\Skill\Domain\Entity\Skill;

/**
 * @author Yiimar
 */
class Fetcher implements FetcherInterface
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
