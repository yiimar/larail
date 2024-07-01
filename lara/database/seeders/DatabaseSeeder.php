<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    private array $seeders;

    public function __construct()
    {
        $this->seeders = config('database.seeder') ?? [];
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->seeders as $seederClass) {
            $seeder = new $seederClass;
            $seeder->run();
        }
    }
}
