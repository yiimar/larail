<?php

declare(strict_types=1);

namespace App\Core\Domain\Entity\SingleTable;

use App\Core\Infrastructure\Database\Enum\TableFields\TableStatuses;
use App\Core\Infrastructure\Database\Enum\TableNames;
use App\Module\Auth\User\Domain\DomainModel\Entity\User\UserStatus;
use Illuminate\Database\Eloquent\Model;
use Parental\HasChildren;

/**
 * Base class for Statuses STI
 *
 * @property string $id
 * @property string $entity_id
 * @property string $type
 * @property string $value
 * @property string $created_at
 * @property string $closed_at
 *
 * @author Yiimar
 */
class Status extends Model
{
    use HasChildren;

    public const ATTR_ID = TableStatuses::FIELD_ID->value;
    public const ATTR_ENTITY_ID = TableStatuses::FIELD_ENTITY_ID->value;
    public const ATTR_TYPE = TableStatuses::FIELD_TYPE->value;
    public const ATTR_VALUE = TableStatuses::FIELD_VALUE->value;
    public const ATTR_CREATED_AT = TableStatuses::FIELD_CREATED_AT->value;
    public const ATTR_CLOSED_AT = TableStatuses::FIELD_CLOSED_AT->value;

    protected $table = TableNames::STATUS;

    protected $fillable = [
        self::ATTR_TYPE
    ];

    protected array $childTypes = [
        'user' => UserStatus::class,
    ];
}
