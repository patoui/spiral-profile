<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App\Command\Seed;

use App\Database\Post;
use Cycle\ORM\TransactionInterface;
use Faker\Factory;
use Faker\Generator;
use Spiral\Console\Command;

class PostCommand extends Command
{
    protected const NAME = 'seed:post';

    protected const DESCRIPTION = '';

    protected const ARGUMENTS = [];

    protected const OPTIONS = [];

    /**
     * Perform command
     * @throws \Throwable
     */
    protected function perform(TransactionInterface $tr): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $post = new Post();

            $post->id           = $i + 1;
            $post->title        = $faker->word();
            $post->slug         = strtolower($post->title);
            $post->body         = implode("\n\n", $faker->paragraphs());
            $post->published_at = gmdate('Y-m-d H:i:s');
            $post->created_at   = gmdate('Y-m-d H:i:s');
            $post->updated_at   = gmdate('Y-m-d H:i:s');

            $tr->persist($post);
        }

        $tr->run();
    }
}
