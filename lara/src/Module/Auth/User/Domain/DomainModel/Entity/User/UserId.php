<?php

declare(strict_types=1);

namespace App\Module\Auth\User\Domain\DomainModel\Entity\User;

use Illuminate\Contracts\Database\Eloquent\Castable;

/**
 * @author Yiimar
 */
class UserId implements Castable
{

    /**
     * @inheritDoc
     */
    public static function castUsing(array $arguments)
    {

    }
}
