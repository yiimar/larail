<?php

declare(strict_types=1);

namespace App\Core\Application\Query;

/**
 * @author Dmitry S
 */
interface FetcherInterface
{
    public function fetch(): mixed;
}
