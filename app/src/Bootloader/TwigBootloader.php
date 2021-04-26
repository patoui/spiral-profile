<?php

declare(strict_types=1);

namespace App\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;

class TwigBootloader extends Bootloader
{
    public function boot(TwigBootloader $twig): void
    {
//        $twig->addExtension(MyExtension::class);
//        $twig->

        // custom options
//        $twig->setOption('name', 'value');
    }
}
