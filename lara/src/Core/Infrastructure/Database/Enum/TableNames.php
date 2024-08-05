<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Database\Enum;

/**
 * @author Yiimar
 */
enum TableNames: string
{
    case USER = 'users';
    case USER_PROFILE = 'profiles';
    case STATUS = 'statuses';
}
