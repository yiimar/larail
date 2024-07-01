<?php

declare(strict_types=1);

namespace App\Domain\Common\Domain\Entity;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Str;

/**
 * @author Yiimar
 */
trait HasIdUlids
{
    use HasUlids;

    /**
     * Привязка к событию создания модели для инициализации next ID
     *
     * @return void
     */
    public static function booted(): void
    {
        parent::creating(static function ($model) {
            $model->id = Str::ulid();
        });
    }
}
