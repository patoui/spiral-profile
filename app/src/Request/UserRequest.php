<?php
/**
 * {project-name}
 *
 * @author {author-name}
 */
declare(strict_types=1);

namespace App\Request;

use Spiral\Filters\Filter;

class UserRequest extends Filter
{
    protected const SCHEMA = [
        'httpRequest' => 'isJsonExpected',
        'name'        => 'data:name',
    ];

    protected const VALIDATES = [
        'name' => ['notEmpty'],
    ];

    protected const SETTERS = [
        'name' => 'strval',
    ];
}
