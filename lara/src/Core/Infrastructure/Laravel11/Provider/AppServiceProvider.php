<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Laravel11\Provider;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repositories
//        $this->app->bind(Domain\User\UserRepository::class, Infrastructure\User\UserRepository::class);
    }

    public function boot(): void
    {
        //
        $this->loadMigrationsPaths();
    }

    private function loadMigrationsPaths(): void
    {
        $paths = [];
        $paths[] = database_path('migrations');

        $directories = config('database.migration_path') ?? [];
        foreach ($directories as $directory) {
            if (is_string($directory)) {
                $paths[] = $directory;
            }
        }

        $this->loadMigrationsFrom($paths);
    }
}
