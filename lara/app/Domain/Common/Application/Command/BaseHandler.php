<?php
declare(strict_types=1);

namespace App\Domain\Common\Application\Command;

/**
 * @author Yiimar
 */
interface BaseHandler
{
    public function handle();
}
