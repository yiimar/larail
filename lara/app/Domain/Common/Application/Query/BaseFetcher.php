<?php

declare(strict_types=1);

namespace App\Domain\Common\Application\Query;

/**
 * @author Yiimar
 */
interface BaseFetcher
{
    public function fetch(): mixed;
}
