<?php

declare(strict_types=1);

namespace App\Module\Auth\User\Domain\DomainModel\Entity\User;

use App\Core\Domain\Entity\SingleTable\Status;
use App\Core\Infrastructure\Database\Enum\TableFields\TableUsers;
use App\Core\Infrastructure\Database\Enum\TableNames;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Parental\HasParent;

/**
 * @author Yiimar
 */
final class UserStatus extends Status
{
    use HasParent;

    public function user(): BelongsTo
    {
        return $this->belongsTo(TableNames::USER->value, TableUsers::FOREIGN_KEY->value);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::ATTR_TYPE,
        self::ATTR_VALUE,
        self::ATTR_ENTITY_ID,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            self::ATTR_CREATED_AT => 'datetime',
            self::ATTR_CLOSED_AT => 'datetime',
        ];
    }
}
