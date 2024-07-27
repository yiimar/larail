<?php

declare(strict_types=1);

namespace App\Module\Skill\Providers;

use App\Module\Skill\Domain\Entity\SkillRepository;
use App\Module\Skill\Infrastructure\Interfaces\SkillRepositoryInterface;
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
