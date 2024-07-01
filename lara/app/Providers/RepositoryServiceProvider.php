<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Skill\Domain\Entity\SkillRepository;
use App\Domain\Skill\Infrastructure\Interfaces\SkillRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SkillRepositoryInterface::class,SkillRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
