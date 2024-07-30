<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Laravel11;

use Illuminate\Foundation\Application AS ApplicationBase;

/**
 * @author Yiimar
 */
class Application extends ApplicationBase
{
    /**
     * @param string $path
     * @return string
     */
    public function path($path = ''): string
    {
        return $this->joinPaths($this->appPath ?: $this->basePath('src'), $path);
    }
}
