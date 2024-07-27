<?php

declare(strict_types=1);

namespace App\Module\Skill\Domain\Entity;

use App\Module\Auth\User\Domain\DomainModel\Entity\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $name
 *
 *
 * @property User[] $users
 */
final class Skill extends Model
{
    use Notifiable;

    public const TABLE_NAME = 'skills';

    public const ATTR_ID = 'id';
    public const ATTR_NAME = 'name';

    public const RELATION_USERS = 'users';

    public $timestamps = false;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, array>
     */
    protected $fillable = [
        self::ATTR_NAME,
    ];
}
