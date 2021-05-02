<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App;

use Spiral\Migrations\Migration;

class CreatePostsTableMigration extends Migration
{
    /**
     * Create tables, add columns or insert data here
     */
    public function up(): void
    {
        $schema = $this->table('posts')->getSchema();

        $schema->column('id')->primary();
        $schema->column('title')->string();
        $schema->column('slug')->string()->nullable();
        $schema->column('body')->text();
        $schema->column('published_at')->datetime();
        $schema->column('created_at')->timestamp();
        $schema->column('updated_at')->timestamp();

        $schema->index(['slug'])->unique();
        $schema->index(['published_at']);

        $schema->save();
    }

    /**
     * Drop created, columns and etc here
     */
    public function down(): void
    {
        $this->table('posts')->drop();
    }
}
