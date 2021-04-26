<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App\Bootloader;

use Psr\Http\Message\ServerRequestInterface;
use Spiral\Boot\Bootloader\Bootloader;

class PrototypeBootloader extends Bootloader
{
    public function boot(\Spiral\Prototype\Bootloader\PrototypeBootloader $prototype): void
    {
        $prototype->bindProperty('server_request', ServerRequestInterface::class);
    }
}
