<?php

declare(strict_types=1);

namespace App\Repository;

use Cycle\ORM\RepositoryInterface;
use Cycle\ORM\Select\Repository;

class UserRepository extends Repository implements RepositoryInterface
{
    public function all(): iterable
    {
        return $this->findAll();
    }
}
