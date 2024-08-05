<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Database\Enum\TableFields;

/**
 * @author Yiimar
 */
enum TableStatuses: string
{
    case FIELD_ID = 'id';
    case FIELD_ENTITY_ID = 'entity_id';
    case FIELD_TYPE = 'type';
    case FIELD_VALUE = 'value';
    case FIELD_CREATED_AT = 'created_at';
    case FIELD_CLOSED_AT = 'closed_at';
}
