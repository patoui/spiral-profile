<?php
/**
 * {project-name}
 * 
 * @author {author-name}
 */
declare(strict_types=1);

namespace App;

use Spiral\Migrations\Migration;

class CreateUserTableMigration extends Migration
{
    /**
     * Create tables, add columns or insert data here
     */
    public function up(): void
    {
        $this->table('users')
            ->addColumn('id', 'primary')
            ->addColumn('name', 'string')
            ->create();
    }

    /**
     * Drop created, columns and etc here
     */
    public function down(): void
    {
        $this->table('users')->drop();
    }
}
