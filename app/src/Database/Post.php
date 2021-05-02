<?php

declare(strict_types=1);

namespace App\Database;

use Cycle\Annotated\Annotation as Cycle;
use DateTimeImmutable;

/**
 * @Cycle\Entity(repository = "App\Repository\PostRepository")
 */
class Post
{
    /** @Cycle\Column(type = "primary") */
    public int $id;

    /** @Cycle\Column(type = "string") */
    public string $title;

    /** @Cycle\Column(type = "string") */
    public string $slug;

    /** @Cycle\Column(type = "text") */
    public string $body;

    /** @Cycle\Column(type = "datetime") */
    public DateTimeImmutable $published_at;

    /** @Cycle\Column(type = "timestamp") */
    public DateTimeImmutable $created_at;

    /** @Cycle\Column(type = "timestamp") */
    public DateTimeImmutable $updated_at;

    /**
     * Get the URI for the post
     * @param string $root
     * @return string
     */
    public function getUri(string $root = ''): string
    {
        return "{$root}/post/{$this->slug}";
    }
}
