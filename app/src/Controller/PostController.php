<?php

declare(strict_types=1);

namespace App\Controller;

use Spiral\Views\ViewsInterface;
use stdClass;

class PostController
{
    public function index(ViewsInterface $views): string
    {
        return $views->render('post/index', [
            // TODO: replace with array of Post entity instances
            'posts' => [],
        ]);
    }

    public function show(ViewsInterface $views): string
    {
        return $views->render('post/show', [
            // TODO: replace with instance of Post entity
            'post' => new stdClass(),
        ]);
    }
}
