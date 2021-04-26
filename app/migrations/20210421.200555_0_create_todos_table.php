<?php
/**
 * {project-name}
 * 
 * @author {author-name}
 */
declare(strict_types=1);

namespace App;

use Spiral\Migrations\Migration;

class CreateTodosTableMigration extends Migration
{
    /**
     * Create tables, add columns or insert data here
     */
    public function up(): void
    {
        $this->table('todos')
            ->addColumn('id', 'primary')
            ->addColumn('label', 'string')
            ->addColumn('body', 'text')
            ->create();
    }

    /**
     * Drop created, columns and etc here
     */
    public function down(): void
    {
        $this->table('todos')->drop();
    }
}
