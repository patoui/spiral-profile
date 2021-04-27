<?php

declare(strict_types=1);

namespace App\Controller;

use Spiral\Views\ViewsInterface;

class HomeController
{
    public function index(ViewsInterface $views): string
    {
        return $views->render('home');
    }
}
