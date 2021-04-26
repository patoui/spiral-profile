<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App\Database;

use Cycle\Annotated\Annotation as Cycle;

/**
 * @Cycle\Entity(repository = "App\Repository\TodoRepository")
 */
class Todo
{
    /** @Cycle\Column(type = "primary") */
    public $id;

    /** @Cycle\Column(type = "string") */
    public $label;

    /** @Cycle\Column(type = "text") */
    public $body;
}
