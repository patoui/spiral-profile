<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Kairee Wu (krwu)
 */

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    public function testDefaultActionWorks(): void
    {
        $got = (string) $this->get('/todo')->getBody();
        self::assertStringContainsString('Todo<', $got);
    }

    public function testInteractWithConsole(): void
    {
        self::assertStringContainsString(
            'cache',
            $this->runCommand('views:reset')
        );
    }
}
