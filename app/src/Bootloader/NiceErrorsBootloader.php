<?php

declare(strict_types=1);

namespace App\Bootloader;

use App\Errors\NiceRenderer;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Bootloader\Http\ErrorHandlerBootloader;
use Spiral\Http\ErrorHandler\RendererInterface;

class NiceErrorsBootloader extends Bootloader
{
    public const DEPENDENCIES = [ErrorHandlerBootloader::class];

    public const SINGLETONS = [
        RendererInterface::class => NiceRenderer::class
    ];
}
