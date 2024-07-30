<?php

declare(strict_types=1);

namespace App\Module\Auth\User\Application\Seeder;

use App\Module\Auth\User\Domain\DomainModel\Entity\User\User;

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
