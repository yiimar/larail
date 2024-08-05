<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Database\Enum\TableFields;

/**
 * @author Yiimar
 */
enum TableUsers: string
{
    case FIELD_ID = 'id';
    case FIELD_EMAIL = 'email';
    case FIELD_PASSWORD = 'password';
    case FIELD_JOIN_CONFIRM_TOKEN = 'join_confirm_token';
    case FIELD_PASSWORD_RESET_TOKEN = 'password_reset_token';
    case FIELD_NEW_EMAIL = 'new_email';
    case FIELD_NEW_EMAIL_TOKEN = 'new_email_token';
    case FIELD_ROLE = 'role';

    case FOREIGN_KEY = 'user_id';

    case RELATION_PROFILE = 'profile';
    case RELATION_STATUSES = 'statuses';
}
