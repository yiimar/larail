<?php

declare(strict_types=1);

namespace App\Domain\Skill\Application\Seeder;

use App\Domain\Skill\Domain\Entity\Skill;
use App\Domain\Skill\Domain\Entity\SkillUser;
use App\Domain\User\Domain\Entity\User;
use Illuminate\Support\Facades\DB;

/**
 * @author Yiimar
 */
class SkillUserSeeder
{
    /**
     * Массив Ids навыков
     *
     * @var array|string[]
     */
    private array $skillIds;

    /**
     * Массив Ids пользователей
     *
     * @var array|string[]
     */
    private array $userIds;

    /**
     * Массив Ids пользователей с уже зафиксированными навыками
     *
     * @var array|string[]
     */
    private array $alreadyUserIds;

    public function __construct()
    {
        $this->skillIds = $this->initSkillIds();
        $this->userIds = $this->initUserIds();
        $this->alreadyUserIds = $this->initAlreadyUserIds();


        $usersSkills = DB::table(SkillUser::TABLE_NAME)
            ->distinct()
            ->get(columns: SkillUser::ATTR_USER_ID);
        $this->alreadyUserIds = $usersSkills
            ->pluck(SkillUser::ATTR_USER_ID)
            ->toArray();
    }

    private function initSkillIds(): array
    {
        $skills = DB::table(Skill::TABLE_NAME)
            ->get();
        return $skills
            ->pluck(Skill::ATTR_ID)
            ->toArray();
    }

    private function initUserIds(): array
    {
        $users = DB::table(User::TABLE_NAME)
            ->get(columns: User::ATTR_ID);
        return $users
            ->pluck(User::ATTR_ID)
            ->toArray();
    }

    private function initAlreadyUserIds(): array
    {
        $usersSkills = DB::table(SkillUser::TABLE_NAME)
            ->distinct()
            ->get(columns: SkillUser::ATTR_USER_ID);
        return $usersSkills
            ->pluck(SkillUser::ATTR_USER_ID)
            ->toArray();
    }

    /**
     * @throws \Exception
     */
    public function run(): void
    {
        foreach ($this->userIds as $userId) {
            if (! in_array($userId, $this->alreadyUserIds, true)) {
                $skillIds = $this->getFakeSkills();
                $result = [];
                foreach ($skillIds as $skillId) {
                    $result[] = [
                        SkillUser::ATTR_SKILL_ID => $skillId,
                        SkillUser::ATTR_USER_ID => $userId,
                    ];
                }
                DB::table(SkillUser::TABLE_NAME)->insert($result);
            }
        }
    }

    /**
     * Формируем массив случайного размера из случайно выбранных элементов
     * массива навыков
     *
     * @return array
     * @throws \Exception
     */
    private function getFakeSkills(): array
    {
        $sliceSkill = $this->skillIds;
        $casesCount = count($sliceSkill);

        $resultNumberOf = random_int(1, $casesCount);   // Рандом-число навыков пользователя

        if ($resultNumberOf === $casesCount) {
            return $sliceSkill;     // Если случайно выбранный размер результата = полному
                                    // размеру скилов
        }

        $result = [];
        for ($key = 0; $key < $resultNumberOf; ++$key) {
            $sliceKeyMax = count($sliceSkill) - 1;
            $resultKey = random_int(0, $sliceKeyMax);
            $result[] = $sliceSkill[$resultKey];
            unset($sliceSkill[$resultKey]);
            $sliceSkill = array_values($sliceSkill);
        }
        return $result;     // массив случайного размера из случайно выбранных
                            // уникальных элементов массива навыков
    }
}
