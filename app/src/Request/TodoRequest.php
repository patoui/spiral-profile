<?php

declare(strict_types=1);

namespace App\Request;

use Spiral\Filters\Filter;

class TodoRequest extends Filter
{
    protected const SCHEMA = [
        'label' => 'data:label',
        'body'  => 'data:body',
    ];

    protected const VALIDATES = [
        'label' => ['notEmpty'],
        'body'  => ['notEmpty'],
    ];

    protected const SETTERS = [
        'label' => 'strval',
        'body'  => 'strval',
    ];
}
