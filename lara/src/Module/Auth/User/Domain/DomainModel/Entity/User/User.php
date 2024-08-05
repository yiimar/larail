<?php

declare(strict_types=1);

namespace App\Module\Auth\User\Domain\DomainModel\Entity\User;

use App\Core\Domain\Trait\HasIdUlids;
use App\Core\Infrastructure\Database\Enum\TableFields\TableUsers;
use App\Core\Infrastructure\Database\Enum\TableNames;
use App\Module\Auth\User\Infrastructure\Database\Factory\UserFactory;
use App\Module\Profile\Domen\Profile;
use Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $join_confirm_token
 * @property string $password_reset_token
 * @property string $new_email
 * @property string $new_email_token
 * @property string $role
 *
 * @property-read \App\Module\Profile\Domen\Profile $profile
 * @property-read \App\Module\Auth\User\Domain\DomainModel\Entity\User\UserStatus $statuses
 *
 * @author Yiimar
 */
final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasIdUlids, Notifiable;

    public const TABLE_NAME = TableNames::USER->value;

    public const ATTR_ID = TableUsers::FIELD_ID->value;
    public const ATTR_EMAIL = TableUsers::FIELD_EMAIL->value;
    public const ATTR_PASSWORD = TableUsers::FIELD_PASSWORD->value;
    public const ATTR_JOIN_CONFIRM_TOKEN = TableUsers::FIELD_JOIN_CONFIRM_TOKEN->value;
    public const ATTR_PASSWORD_RESET_TOKEN = TableUsers::FIELD_PASSWORD_RESET_TOKEN->value;
    public const ATTR_NEW_EMAIL = TableUsers::FIELD_NEW_EMAIL->value;
    public const ATTR_NEW_EMAIL_TOKEN = TableUsers::FIELD_NEW_EMAIL_TOKEN->value;
    public const ATTR_ROLE = TableUsers::FIELD_ROLE->value;

    public const RELATION_STATUSES = TableUsers::RELATION_STATUSES->value;
    public const RELATION_PROFILE = TableUsers::RELATION_PROFILE->value;

    protected $table = self::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, array>
     */
    protected $fillable = [
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
        self::ATTR_JOIN_CONFIRM_TOKEN,
        self::ATTR_PASSWORD_RESET_TOKEN,
        self::ATTR_NEW_EMAIL_TOKEN,
    ];

    public function statuses(): BelongsToMany
    {
        return $this->belongsToMany(UserStatus::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            self::ATTR_PASSWORD => 'hashed',
        ];
    }

    protected function id(): Attribute
    {
        return Attribute::make(
            get: static fn (string $attribute) => UserId::fromString(
                $attribute
            ),
            set: static fn (UserId $value) => [
                self::ATTR_ID => $value->toString()
            ],
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
