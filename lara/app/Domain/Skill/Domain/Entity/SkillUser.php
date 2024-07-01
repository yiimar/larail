<?php

declare(strict_types=1);

namespace App\Domain\Skill\Domain\Entity;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

final class SkillUser extends Model
{
    use
        Notifiable,
        HasUlids;

    public const TABLE_NAME = 'skill_user';

    public const ATTR_USER_ID = 'user_id';
    public const ATTR_SKILL_ID = 'skill_id';

    public $timestamps = false;

    /**
     * Composite Primary Key
     *
     * @var array|string[]
     */
    protected $primaryKey = [self::ATTR_USER_ID, self::ATTR_SKILL_ID,];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, array>
     */
    protected $fillable = [
        self::ATTR_USER_ID,
        self::ATTR_SKILL_ID,
    ];
}
