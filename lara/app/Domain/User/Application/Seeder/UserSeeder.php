<?php

declare(strict_types=1);

namespace App\Domain\User\Application\Seeder;


use App\Domain\User\Domain\Entity\User;

/**
 * @author Yiimar
 */
class UserSeeder
{
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();
    }
}
