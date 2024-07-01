<?php

declare(strict_types=1);

namespace App\Domain\User\Domain\Entity;

use App\Domain\Common\Domain\Entity\HasIdUlids;
use App\Domain\Skill\Domain\Entity\Skill;
use App\Domain\User\Application\Seeder\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property bool $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Skill[] $skills
 *
 */
final class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasIdUlids;

    public const TABLE_NAME = 'users';

    public const ATTR_ID = 'id';
    public const ATTR_NAME = 'name';
    public const ATTR_EMAIL = 'email';
    public const ATTR_EMAIL_VERIFIED_AT = 'email_verified_at';
    public const ATTR_PASSWORD = 'password';
    public const ATTR_REMEMBER_TOKEN = 'remember_token';
    public const ATTR_CREATED_AT = 'created_at';
    public const ATTR_UPDATED_AT = 'updated_at';

    public const RELATION_SKILLS = 'skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, array>
     */
    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_EMAIL,
        self::ATTR_PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::ATTR_PASSWORD,
        self::ATTR_REMEMBER_TOKEN,
    ];

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            self::ATTR_EMAIL_VERIFIED_AT => 'datetime',
            self::ATTR_PASSWORD => 'hashed',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
