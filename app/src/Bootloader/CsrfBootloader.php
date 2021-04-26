<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Bootloader\Http\HttpBootloader;
use Spiral\Csrf\Middleware\CsrfFirewall;

class CsrfBootloader extends Bootloader
{
    public function boot(HttpBootloader $http_bootloader): void
    {
        $http_bootloader->addMiddleware(CsrfFirewall::class);
    }
}
