<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App\Repository;

use App\Database\Post;
use Cycle\ORM\Select\Repository;

class PostRepository extends Repository
{
    public function findBySlug(string $slug): ?Post
    {
        return $this->select()->where('slug', $slug)->fetchOne();
    }
}
