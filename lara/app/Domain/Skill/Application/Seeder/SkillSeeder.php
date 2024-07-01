<?php

declare(strict_types=1);

namespace App\Domain\Skill\Application\Seeder;

use App\Domain\Skill\Domain\Entity\Skill;

/**
 * @author Yiimar
 */
class SkillSeeder
{
    private const ITEMS = [
        [Skill::ATTR_NAME => 'php'],
        [Skill::ATTR_NAME => 'js'],
        [Skill::ATTR_NAME => 'golang'],
        [Skill::ATTR_NAME => 'java'],
    ];

    public function run(): void
    {
        foreach (self::ITEMS as $item) {
            Skill::firstOrCreate($item);
        }
    }
}
